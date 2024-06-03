<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\AppointmentAttachments;
use App\Http\Requests\Front\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\User;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class BookAppointmentController extends Controller
{
    use ResponseJson;

    public function Book_Appointment(Request $request , $doctor_id)
    {
        if($request->isMethod('POST')) {
            $specializeion = User::with('doctorInfo.specializeion')->where('id', $doctor_id)->first();
            $urgent = $request->urgent;
            return view('front.appointment.book_form', compact('doctor_id', 'specializeion', 'urgent'));
        }else
        {
            return redirect(route('specializes')) ;
        }
    }

    public function save_appointment(StoreAppointmentRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['user_id'] = auth()->id();
            // Create a new Appointment instance

            $appointment     = Appointment::updateOrCreate(['id' => 0], $data);

            /** Store Files And Voices */
            /** Store Voice */
            if ($request->hasFile('voice')) {
                $recordedAudio = $request->file('voice');
                // Move the audio file to a desired location
                $audioFileName = time() . '_' . $recordedAudio->getClientOriginalName();
                $recordedAudio->move(public_path('uploads/appointments/' .  $appointment->id .'/audio'), $audioFileName);

                AppointmentAttachments::updateOrCreate(
                    ['appointment_id' => $appointment->id],
                    ['voice' => $audioFileName]
                );
            }

            if ($request->hasFile('medications_voice')) {
                $recordedAudio = $request->file('medications_voice');
                // Move the audio file to a desired location
                $audioFileName = time() . '_' . $recordedAudio->getClientOriginalName();
                $recordedAudio->move(public_path('uploads/appointments/' .  $appointment->id .'/audio'), $audioFileName);

                AppointmentAttachments::updateOrCreate(
                    ['appointment_id' => $appointment->id],
                    ['medications_voice' => $audioFileName]
                );
            }


            if ($request->hasFile('compliant_voice')) {
                $recordedAudio = $request->file('compliant_voice');
                // Move the audio file to a desired location
                $audioFileName = time() . '_' . $recordedAudio->getClientOriginalName();
                $recordedAudio->move(public_path('uploads/appointments/' .  $appointment->id .'/audio'), $audioFileName);

                AppointmentAttachments::updateOrCreate(
                    ['appointment_id' => $appointment->id],
                    ['compliant_voice' => $audioFileName]
                );
            }
            /**End Storing Voices */
            /** Storing Images And Videos */
            if($appointment) {
                $appointment_attach = new AppointmentAttachments();
                $appointment_attach->appointment_id = $appointment->id;
                if ($request->file('x_rays_images')) {
                    $images1 = $request->file('x_rays_images');
                    $file_name = uploadappointmentReports($images1, 'appointments/' . $appointment->id . '/reports');
                    $data['x_rays_images'] = $file_name;
                    $appointment_attach->x_rays_images = $data['x_rays_images'];
                }

                if($request->file('cd_reports_images')) {
                    $images            = $request->file('cd_reports_images');
                    $file_name         = uploadappointmentReports($images1, 'appointments/' .  $appointment->id .'/reports');
                    $data['cd_reports_images']     = $file_name;
                    $appointment_attach->cd_reports_images   = $data['cd_reports_images'];
                }

                if($request->file('test_medical_attachment')) {
                    $attachment         = $request->file('test_medical_attachment');
                    $file_name          = uploadappointmentReports($attachment, 'appointments/' .  $appointment->id .'/reports');
                    $data['test_medical_attachment'] = $file_name;
                    $appointment_attach->test_medical_attachment   = $data['test_medical_attachment'];
                }

                if($request->file('medications_images')) {
                    $attachment         = $request->file('medications_images');
                    $file_name          = uploadappointmentReports($attachment, 'appointments/' .  $appointment->id .'/reports');
                    $data['medications_images'] = $file_name;
                    $appointment_attach->medications_images   = $data['medications_images'];
                }

                if($request->file('regularly_medications_image')) {
                    $attachment         = $request->file('regularly_medications_image');
                    $file_name          = uploadImage($attachment, 'appointments/' .  $appointment->id .'/reports');
                    $data['regularly_medications_image'] = $file_name;
                    $appointment_attach->regularly_medications_image   = $data['regularly_medications_image'];
                }

                if($request->file('cd_reports_video')) {
                    $cd_reports_video           = $request->file('cd_reports_video');
                    $file_name                 = uploadFile($cd_reports_video, 'appointments/' .  $appointment->id .'/audio');
                    $data['cd_reports_video']   = $file_name;
                    $appointment_attach->cd_reports_video   = $data['cd_reports_video'];
                }

                $appointment_attach->save();
            }
            // Commit transaction if all goes well
            DB::commit();

            // Return success response
            return response()->json(['message' => 'Stored Successfully'], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // If there are validation errors, return them as JSON response
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Rollback transaction if any exception occurs
            DB::rollback();
            // Return error response
            return response()->json(['message' => 'Failed to store appointment'], 500);
        }
    }

    public function appointment_details($id = null)
    {
        $appointment = Appointment::with('attachments')->where('id', $id)->first() ;

        return view('front.appointment.appointment_details' , compact('appointment'));
    }

}

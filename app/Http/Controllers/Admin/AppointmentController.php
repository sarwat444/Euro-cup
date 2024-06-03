<?php

namespace App\Http\Controllers\Admin;

use App\Events\sendNotification;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\appointments\StoreRequest;
use App\Models\MeetingEntry;
use App\Models\UserMeeting;
use App\Repositories\Panel\AppointmentEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $appointment;
    public function __construct(AppointmentEloquent $appointmentEloquent)
    {
        $this->appointment = $appointmentEloquent;
    }


    public function index()
    {
        return view('panel.appointments.index');
    }

    public function getDataTable()
    {
        return $this->appointment->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->appointment->create();
        return view('panel.appointments.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->appointment->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $appointment = $this->appointment->show($id);
        return view('panel.appointments.show', compact('appointment'));
    }

    public function changeStatus($id)
    {
        $response = $this->appointment->changeStatus($id);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createMeetingggg2 () {
          $name = 'agora'.time().rand(1111 , 9999);
          $meetingData  = createAgoraProject($name);
         // dd($meetingData);
         if(isset($meetingData->project->id)) {
             $meeting           = new UserMeeting();
             $meeting->user_id  = 4;
             $meeting->app_id   = $meetingData->project->sign_key;
             $meeting->appCertificate  = $meetingData->project->vendor_key;
             $meeting->channel  = $meetingData->project->name;
             $meeting->uid      = rand(1111,9999);
             $meeting->save();
             if( $meeting) {
                $token  = createToken($meeting->app_id , $meeting->appCertificate ,  $meeting->channel);
                $meeting->token = $token ;
                $meeting->url   = generateRandomString();
                $meeting->save();
               // return redirect('joinMeeting/'.$meeting->url);
             }
             DB::commit();
         }else {
             dd('project_not _create');
         }
    }

    public function createMeeting (Request $request) {
        $response = $this->appointment->createMeeting($request);
        return $this->response_api($response['status'], $response['message']);

    }

    public function joinMeeting($url='') {

        $meeting = UserMeeting::where('url' , $url)->first();
        if($meeting) {
            $meeting->app_id          = trim($meeting->app_id);
            $meeting->appCertificate  = trim($meeting->appCertificate);
            $meeting->channel         = trim($meeting->channel);
            $meeting->token           = trim($meeting->token);
            if(auth()->user() && auth()->user()->id == $meeting->user_id) {
                $channel  = $meeting->channel;
                $event = generateRandomString(5);
                $this->createEntry($meeting->user_id , auth()->user()->id , $meeting->url , $event , $meeting->cahnnel);
            }else {
                 $event = generateRandomString(5);
                 $this->createEntry($meeting->user_id , auth()->user()->id , $meeting->url , $event , $meeting->cahnnel);
                 $channel  = $meeting->channel;
                 Session::put('random_user' , $meeting->user_id);
            }

            return view('front.meeting.join' , get_defined_vars());
        }else {
             dd('meeting not exist');
        }
    }

    public function createEntry($user_id , $random_user , $url , $event , $channel) {
         $entry = new MeetingEntry() ;
         $entry->user_id      = $user_id;
         $entry->random_user  = $random_user;
         $entry->url          = $url;
         $entry->event        = $event;
         $entry->channel      = $channel;
         $entry->save();
    }

    public function saveUserName(Request $request) {
       $saveName  = MeetingEntry::where([
           'random_user'   => $request->random,
           'url'           => $request->url
       ])->first();

       if(@$saveName->status == 3) {

       }else {
          $saveNamee  = new MeetingEntry();
          $saveNamee->name   = $request->name;
          $saveNamee->status = 1;
          $saveNamee->save();
          $meeting  = UserMeeting::where('url' , $request->url)->first();
          $data     =['random_user' => $request->random , 'title' => $saveNamee->name . ' want to enter the meeting'];
          event(new sendNotification($data , @$meeting->channel , @$meeting->event));

       }
    }

    public function meetingApprove(Request $request) {
        $saveName  = MeetingEntry::where([
            'random_user'   => $request->random,
            'url'           => $request->url
        ])->first();

        $saveName->status   = $request->type;
        $saveName->save();
        $data     =['status' => $request->type ];
        event(new sendNotification($data , @$saveName->channel , @$saveName->event));


     }


}

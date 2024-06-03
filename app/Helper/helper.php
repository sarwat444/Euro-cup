<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



function locales()
{
    $arr = [];
    foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
        $arr[$key] = __('translate.' . $key);
    }
    return $arr;
}

function default_locales()
{
    $arr = [];
    foreach (LaravelLocalization::getSupportedLocales() as $key => $value) {
        $arr[$key] = __('translate.' . $key);
    }
    return $arr;
}


function uploadFile($file, $custome_path='', $is_full_path=false)
{
    if ($custome_path == '') {
            $path = public_path('uploads/files/');
    } else {
        if(!$is_full_path) {
            $path = public_path('uploads/'.$custome_path);
        }else{
            $path = $custome_path;
        }
    }
    $extension = $file->getClientOriginalExtension();
   // dd($extension);
    $filename = 'file_' . time() . mt_rand() . '.' . $extension;
    $originalName = str_replace('.' . $extension, '', $file->getClientOriginalName());
    $file->move($path, $filename);
    return 'uploads/'. $custome_path . '/' .$filename;
}

function uploadImage($image, $custome_path='', $is_full_path=false)
{
    if ($custome_path=='') {
        $path = public_path('uploads/images/');
    } else {
        if(!$is_full_path) {
            $path = public_path('uploads/'.$custome_path);
        }else{
            $path = $custome_path;
        }
    }
    $extension    = $image->getClientOriginalExtension();
    $imagename    = 'image_' . time() . mt_rand() . '.' . $extension;
    $image->move($path, $imagename);

    return 'uploads/'. $custome_path . '/' .$imagename;
}

function uploadappointmentReports($images, $custome_path='', $is_full_path=false)
{
    if ($custome_path=='') {
        $path = public_path('uploads/images/');
    } else {
        if(!$is_full_path) {
            $path = public_path('uploads/'.$custome_path);
        }else{
            $path = $custome_path;
        }
    }

    if(!empty($images)) {
        $imageNames = [];
        foreach($images as $image) {
            $extension    = $image->getClientOriginalExtension();
            $imagename    = 'image_' . time() . mt_rand() . '.' . $extension;
            $originalName = str_replace('.' . $extension, '', $image->getClientOriginalName());
            $image->move($path, $imagename);
            $imageNames[] = 'uploads/'. $custome_path . '/' . $imagename;
        }
        return json_encode($imageNames);
    }
}

function createAgoraProject($name) {

    $app_id            = env('AGORA_APP_ID');
    $app_secret        = env('AGORA_APP_CERTIFICATE');
    $credentials       = $app_id . ":" . $app_secret;
    $base64Credentials = base64_encode($credentials);
    $arr_header        = "Authorization: Basic ".$base64Credentials;
    $curl              = curl_init();
    curl_setopt_array($curl , array(
    CURLOPT_URL => 'https://api.agora.io/dev/v1/project',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING       => '',
    CURLOPT_MAXREDIRS      => 10,
    CURLOPT_TIMEOUT        => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST  => 'POST',
    CURLOPT_POSTFIELDS     => '{"name": "' .$name . '",
        "enable_sign_key": true
    }',
    CURLOPT_HTTPHEADER => array(
         $arr_header,
        'Content-Type: application/json',
    ),

    ));

    $response  = curl_exec($curl);
    curl_close($curl);
    $result    = json_decode($response);
    return $result;
}

function createToken($appId , $appCertificate , $channelName) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://mehandrucompany.com/agoraToken/sample/RtcTokenBuilderSample.php',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('appId' => $appId, 'appCertificate' => $appCertificate, 'channelName' => $channelName),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function generateRandomString($length = 7) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charLength - 1)];
    }
    return $randomString;
}





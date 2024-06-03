<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgoraController extends Controller
{
    public function generateToken(Request $request)
    {
        $appId = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');
        $channelName = $request->get('channelName'); // Retrieve channel name from request
        $uid = uniqid(); // Generate a unique user ID

        // Generate a dynamic access token (replace expiration time as needed)
        $expirationTimeInSeconds = 3600; // 1 hour
        $currentTimestamp = time();
        $privileges = RtcTokenBuilder:: | RtcTokenBuilder::; // Privileges (recording, publish audio)
        $token = (new RtcTokenBuilder($appId, $appCertificate, $channelName, $uid, $currentTimestamp, $expirationTimeInSeconds, $privileges))->build();

        return response()->json(['token' => $token]);
    }
}

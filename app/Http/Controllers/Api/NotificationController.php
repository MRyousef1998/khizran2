<?php

namespace App\Http\Controllers\api;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Http;
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
   
    
    public function getNotification(Request $request)
    {
      $address= Notification::where('topic',$request->topic)->orWhere('topic', '=', "users")->get();
      return response()->json([
          'message' => 'successfully',
          'address' => $address
      ], 201);

    }
    
    function sendGCM(Request $request)

{





    $url = 'https://fcm.googleapis.com/v1/projects/lastproject-f8b0f/messages:send';



    $fields = array(
     "message"=>   array(
            "topic" => $request->topic,
            'notification' => array(

            "body" =>  $request->message,

            "title" =>  $request->title,

            // "click_action" => "FLUTTER_NOTIFICATION_CLICK",

            // "sound" => "default"



        ),
        'data' => array(

            "pageid" => $request->pageid,

            "pagename" => $request->pagename

        )
    ),

        

        // 'priority' => 'high',

        // 'content_available' => true,



        

     



    );





    $fields = json_encode($fields);

    $headers = array(

        'Authorization:Bearer '.$request->ApiToken,

        'Content-Type: application/json'

    );



    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);



    $result = curl_exec($ch);

    return $result;

    curl_close($ch);

}

function sendGCMW(Request $request)

{
    $Notification=  Notification::create([
        'title' => $request->title,
        'body' => $request->message,
        'topic' => $request->topic,
        'pageid' => $request->pageid,
        'pagename' => $request->pagename,
        
        
    ]);


    $url = 'https://fcm.googleapis.com/v1/projects/lastproject-f8b0f/messages:send';

    $credentialsFilePath="json/lastproject-f8b0f-b3b6f4993374.json";
   
    $client= new GoogleClient();
    
    $client->setAuthConfig($credentialsFilePath);
 
    $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
    $client->refreshTokenWithAssertion();
    $token=$client->getAccessToken();
    $access_token=$token['access_token'];


    $fields = array(
     "message"=>   array(
            "topic" => $request->topic,
            'notification' => array(

            "body" =>  $request->message,

            "title" =>  $request->title,

            // "click_action" => "FLUTTER_NOTIFICATION_CLICK",

            // "sound" => "default"



        ),
        'data' => array(

            "pageid" => $request->pageid,

            "pagename" => $request->pagename

        )
    ),

        

        // 'priority' => 'high',

        // 'content_available' => true,



        

     



    );





    $fields = json_encode($fields);

    $headers = array(

        'Authorization:Bearer '.$access_token,

        'Content-Type: application/json'

    );



    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);



    $result = curl_exec($ch);

 return response()->json([
            'message' => 'successfully',
            'notification' => $Notification
        ], 201);
    return $result;

    curl_close($ch);

}



}

<?php

namespace App\Http\Controllers\api;


use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
        //
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

        'Authorization:Bearer '."#ya29.c.c0ASRK0GauLom13BFWTBX12Q0i4G8Gd29nV5B7FJsrGdE4ftDiFAmoEjAZBLgN8-ENlQ09mxjajKydArjp6-TtrwQejBZYyQ8o6qQ31GP5EwNgcLf47eTNyF9Qrt6JnIp9aPmBzCG6WmlADMn3gco8A_zz1Pf6cJB8TcVKH7zJGyY_-EcOW4_nP4csNmlzEVXdemeII0rDr5AADCxdsS3hAoGNXOMV4phD5PNzqd50kDTw9RmlfqvnyWCZDxkyIqc3VEVlIfjjgGoWSCnfeAtPuYA41o_utjWoznai8jlfczLX_nMeqcxEphwAsJdhdazyxUEQu4k49gbR14y0-FPSPm7rdJvzKdhd7GBCFH9jFYb4lhvp0GJupg5NRO4G388PxXeQkhvqUwW63cYsuar4xQq8VR52YZwU4x7e_WrdQlJ2htF2B3OSUMaVWWWe67iepQ4V6l2osmfYmr9wh9f963zfowhR_zOU-iopcJyhZqSI2y_ei8uOaiRcX7IZelS6Xru_lOO2wrwr8z6BeBBvR_XOMdQh10hzRt65VgIebmgvvjVb4yiWbFWnpJzI7ahs4ncYFsUtts5xsvFV1dBiz2wkIq6Vw-tyBvMIMviYIXy_y3jRoi3urSXmbXql2aU_VqMi83BIglWl6q9-y-fxflqY5QxnJMUbWsgczVZu2IlBrgsU5Boi2aJfYbR_voxrOl7zB33xJq5M1XMRbuJg8J_dbjBibS2dFrhvh_nz8OljqtcVUQh7gpu2rs1n8V6a4a_vYYe2140kXiiFvmRnercxw22y2UvxsJZlgaIhZ-2dgt7h5_FjxJckqea9ZrIfMnecjtjBFObpr91020vFimQtM851yn8WbocBlBlhFlI6eJs8WIhV_8tqXbX3m_t7dUn7yeZ7QkfsWorOIjy2gvrdhbZfltObxkW-trsvw9bJOMOZX31krO-eavh53evVmYi0jR_VFi8VzgzSefppYfwlcSvXFVSdSbsS15w",

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
}

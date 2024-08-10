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

        "to" => $request->topic,

        // 'priority' => 'high',

        // 'content_available' => true,



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



    );





    $fields = json_encode($fields);

    $headers = array(

        'Authorization: Bearer '."ya29.c.c0ASRK0GaTccD0TvTINF54iHJKW-CgMXJ78-vqunxqXkCNmxDELvopa5S3uijnics96yDQOXvTHHTLY8iePZiGH3F68hn4DTEWBNzB7dChtcLHQb_ard3MjgGNIk2FDyfn7oilOf537eH5_9h1I58MCHlQAWwwBLhpEhXV2RdXHAzLVFKtK56KP--jUhnnfWB6o0LzJLF33frljNmOvSPY65yRPERJtqhmUg6RvCbSgr8ilZIyvF4cWGM1ysqvW4OqiY5w2eRGdwPLB-TXWcnm8Piol8y-Qyu7RuAbYwxRQrJl8dAF8alPN3UbvdUjj51ZgVWBJ4qViFW27YXpwuMUAJac6rshePraWuEKIZCnbm37zsdbsQBAUq1Xe0sT388AoIY-XQMnXq01JMlgF1O4cY8IbMkBYy557ne8fYIsvIOblv5FW7fMZdMcB63OoOjmaUrUcqpRy1aetXg7lzp4ZBW-zx88MIWdUmog8BlZ_Izjs36rFVshe3ftVjF3BiQbYhp5Z2xwXIzUdxwX9IqaqJf9tpIs_bdMze-42O54ekm73deYRUoB1pt0zcg6Iesxi1Ba1Sh-kiyU4bdyOnmserbv_pBfjjFiRRdJOvYtgUqo_Wmlqlc9_YRklIx4S56dcOMM0scUbxRkes49eRBzb63s1Y_oon36Br9asbi_S2ZQUB77ehqBR7asI94pq1loorh5OrlW5RYM4qRO8-XIskQ4vs0djznxVW414S-tVdtXdnq2q_qYoz7_z45nm7Ufpt29mdRlVz3vJ_ZjImi2MZzvjga1YIoWyFiyr0rbkIbdorkzFFl1mm-SOsmJfq0-29XkhUsx1unhpa92c2_kWXw-mwh0MagtIB0WQVqFJYJxIiFoeVfxr7jgmo0oaZvxmeR7ivrkFhbvdv5h9k9r1b81x1s9q1ovsydxiVvrti_xkJB9efFpUaQbq3mM8Z8q2zot_p7McZIpl3WXngypenskSSUyma-mFghlIov",

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

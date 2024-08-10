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
    ),

        

        // 'priority' => 'high',

        // 'content_available' => true,



        

        'data' => array(

            "pageid" => $request->pageid,

            "pagename" => $request->pagename

        )



    );





    $fields = json_encode($fields);

    $headers = array(

        'Authorization: Bearer '."ya29.c.c0ASRK0GZSko67D4NdQEkN8fO7vsld69L-8B7xvR6Krg4hQD0SwH0X7xTmBvYRV8KgpMQ-zF9O0XqFumMDqGLkh1OMPDtreBrYjpk2XBwwLA4hmOxm_hJBpOkV-2xIr5eflIQkALi9ADa_ngrsof5Bc3maKb3sZfqzvcioUquVOHIrWQSZJYgl6BxEUiS0IlcBj3-rE06r_rBnG_iQSChPuNziPWjtUnLoYH3tMuJHIJKDapVuTsceoGVTp53EyauMHpL12fPTqnGCNN7-yUOMv4pVyxl1xxHdsZ1tghGLmKAutKoPmOqb7FHc5RyDcmKaBj_u7Nypf3sfNmwmwChyy1Rt5l8GeO5nmXAze_0HmrzNyzGHIDnt4CyUKIq2E389P4ZxogRVm6J8q69B4_fQBaRy2679sr0Il82nrzYM1Q7By26Vve2mg32-k2w1_QQ2h-X9i0qIBdsx3YiyIXSpFSUJx92f-on7x3VR6rS9W_Yla1V_3OjSbudXeoM7587hgqkJQ2f8sI9-fedtnsXhSqy4q4FStiqw01_Jl5Sg6pycnbBVhw0Ye6-l55apl1FMqI5vxSwyQXkZ2Zd41Fqk0lv_YWliOZWRrplzSZ7n3gd7qpaY2VjbYb0eq40uRzB3d9YXkbz9FrBcYYbYb3BwxyZBj2ypRvl_YJVsJMXaxeulkZ6awiYd0wQrVmIjWjmZfcFipmhmR197aFYWm06BI7kXdwBXaSfW2gVqxoMtY54bnwZ_yc3R_4yi_7Junu_WxWc-Zja50SxxXJddR3Whbwhipjb88q2skbwbYhlcb_0dod7vVt5WffUwh0rjQq6Xd9QO_lURJypkkc8etzxjeJ_k_p4IUyjvBx5qh2t-8J15wmSsjv_IiRMMw6eRx3UBUgv88fWtM19eYYpryzjijxrVWoznQlXU_rUYqUo_BYbsZYW3_qvVYUMYiu9IFJjZWf4RRXl87ponsa1hi7a6wrQgy8p1Yg6MoQoaduu",

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

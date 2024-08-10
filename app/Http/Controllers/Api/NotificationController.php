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

        "to" => '/topics/' . $request->topic,

        'priority' => 'high',

        'content_available' => true,



        'notification' => array(

            "body" =>  $request->message,

            "title" =>  $request->title,

            "click_action" => "FLUTTER_NOTIFICATION_CLICK",

            "sound" => "default"



        ),

        'data' => array(

            "pageid" => $request->pageid,

            "pagename" => $request->pagename

        )



    );





    $fields = json_encode($request->fields);

    $headers = array(

        'Authorization: Bearer '."ya29.c.c0ASRK0Ga_aOljHNdtmCMECapHfR-5-1ir2cyYo3B1leiOSYrk9oKnHSs6a-3aCFixUiewUiOk9qkMWzfCbIJ7m9z72X9X_8jJGDwE1hV0KrYeWC5ZbeB7hPps9BNOX78wPNtkewkezF6vcxj12pRD4OEz2cB0Q9JGZuzotrF16tAkgKYf5vwHK2IAKOPmJGGzhrW2LrhB_RgTjCLYEOzp1iIrYwlMIyZmnFC2ZbAq0g0MYZZLXZO4E0yzs9A0TeztG2q8Xcf_jiPVamZblQ99TuyjVKDLMamM_ON2JX4BVaLjVboAUdptQFF1qQg_IpSCQRfSmSp2azV67-xU5e-84HFp6VawWCr6BXAk4Pt1cu_ZbQUIjkqzSfzJanA2H389CiYvUyRyo4dVq6ubFBn5VUlnqUOnI6jMp6z02WIjy2ts5xnBjn8cr7tU7FnkOpSlcB8oxkiaUit2cJd6RQOBryl-177buOQsa7bv5sI5t7IfQmnRVdjcsq5pdjUQ9hupua8M9oanJOsaQWh4s1UJ-b9yVBZz8jw-zbYS0f63_4VserVs9__f3U6f9VreX7iX1lO6iJdXjn_JSvniMJ8kpI7xyWVQ-FX5a1Vkk80OQlztVnfy2Q2sWmychp12Fza32Ug1WtB_I2d0Bzr5cdOnnRZb_cihM-ms8f2_YYFR1yW3ZB-fIxuhxfsx4jf-svkfsjwr2uw4dt2fSUQ-jyzF10gscj4ba4oq0eaepjk107SXluRX4I0-6bt6IScfdBdnsvvB767mJvshR8bwWvSy_toZ5a_UMcg30BZybVO7wSmrXOW9YtrxFveu57t9tgaxsyVRrOpvWzYkqOWaJMM0FlwlkmBy3x91BUYeehdUr1zxSazoyxIl1_W68mYekVr3RcIB419-7lzS89w65W-f54XXrfY1uhMs6jfYw3jxynnZc0UJVJg7lUOdeUfXa6me7aryS_99waorM42j63IfU1i_cwqtb95xpve3IqY",

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

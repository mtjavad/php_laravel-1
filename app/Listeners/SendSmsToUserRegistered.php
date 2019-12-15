<?php

namespace App\Listeners;

use App\Events\UserNotify;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Kavenegar\KavenegarApi;

class SendSmsToUserRegistered implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserNotify  $event
     * @return void
     */
    public function handle(UserNotify $event)
    {
        try {
            $sender = env('SMS_SENDER');
            $receptor = $event->user['phone_number'];
            $message = "سلام ".$event->user['name']." عزیز. $event->msg";
//            dd($receptor,$message);
            $api = new KavenegarApi(env('SMS_API_KEY'));
            $result = $api->Send($sender, $receptor, $message);
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            //In case that error throw 200
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
//in case that there is any problem to connect to webservie  this error thow
            echo $e->errorMessage();
        }
    }
}

<?php

namespace App\Services;
use Twilio\Rest\Client;

class SmsService
{
    protected $twilioClient;
    protected $fromNumber;

    public function __construct()
    {
        $this->twilioClient = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
        $this->fromNumber = env('TWILIO_PHONE_NUMBER');
    }
    public function sendCode($phone, $verificationCode){
        return [
            'status' => 'success',
        ];

        // Отправка SMS
        try {
            $this->twilioClient->messages->create(
                $phone,
                [
                    'from' => $this->fromNumber,
                    'body' => "Your code is: $verificationCode"
                ]
            );

            return response()->json([
                'status' => 'success',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
            ], 500);
        }
    }
}

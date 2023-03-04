<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function index()
    {
        $twilio = app(Client::class);

        $twilio->messages->create(
            '+261343818165',
            [
                'from' => '+12029293645',
                'body' => 'Hello from Laravel!'
            ]
        );
    }
}

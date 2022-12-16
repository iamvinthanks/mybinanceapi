<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PaymentController extends Controller
{
    public function validatebank(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://api-stg.oyindonesia.com/api/account-inquiry', [
            'headers' => [
                'x-oy-username' => 'alvinnasa',
                'x-api-key' => '9bc75d6b-fe31-46d6-a9c3-dc4bd29f47cc',
                'content-type' => 'application/json'
            ],
            'body' => json_encode([
                'bank_code' => '014',
                'account_number' => '0960997026',
            ]),
        ]);
        $data = json_decode($response->getBody()->getContents());
        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

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
                'bank_code' => $request->bank_code,
                'account_number' => $request->account_number,
            ]),
        ]);
        $data = json_decode($response->getBody()->getContents());
        return response()->json($data);
    }
    public function sendmoney(Request $request)
    {
        $txid = 'TX-'.Carbon::now()->format('YmdHis');
        
        $client = new Client();
        $response = $client->request('POST','https://api-stg.oyindonesia.com/api/remit',[
            'headers' => [
                'x-oy-username' => 'alvinnasa',
                'x-api-key' => '9bc75d6b-fe31-46d6-a9c3-dc4bd29f47cc',
                'content-type' => 'application/json',
                'accept'=>'application/json',
            ],
            'body'=> json_encode([
                'recipient_bank' => $request->recipient_bank,
                'recipient_account' => $request->recipient_account,
                'amount' => $request->amount,
                'partner_trx_id'=>$txid,
            ]),
        ]);
        $data = json_decode($response->getBody()->getContents());
        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class BinanceController extends Controller
{
    public function verifcode()
    {
        $result[]=null;
        $times = Carbon::now()->timestamp;
        $time = $times.'000';
        $secret = 'bTMX1aGstZ44J27r38MhsSE3dFESb6tUYYbvcSpkUbM5FfB3eE2BCWclbSHS3Hg0';
        $signature = hash_hmac('sha256','referenceNo=0033001007430846&timestamp='.$time, $secret);
        $client = new Client();
        $response = $client->request('GET', 'https://api.binance.com/sapi/v1/giftcard/verify', [
            'query' => [
                'referenceNo' => '0033001007430846',
                'timestamp' =>$time,
                'signature'=>$signature,
            ],
            'headers' => [
                'X-MBX-APIKEY' => 'ZM6HtzE7AxRTZOWKhNcJ3RQEhy0qypgWttr5ZEcXRxVYDgiGAlJlG0wc9qUBEJFr',
            ],]);
        $data = json_decode($response->getBody()->getContents(), true);
        $token = $data['data']['token'].'IDRT';
        $price = $this->price($token);
         // hitung total
        $total = $data['data']['amount'] * $price['price'];
        dd($total);
        return response()->json($data);
    }

    public function redeemcode(Request $request)
    {
        $time = Carbon::now()->timestamp.'000';
        $secret = 'bTMX1aGstZ44J27r38MhsSE3dFESb6tUYYbvcSpkUbM5FfB3eE2BCWclbSHS3Hg0';
        $signature = hash_hmac('sha256','code='.$request->code.'&timestamp='.$time, $secret);

        $client = new Client();
        $response = $client->request('POST', 'https://api.binance.com/sapi/v1/giftcard/redeemCode', [
            'query' => [
                'code' => $request->code,
                'timestamp' =>$time,
                'signature'=>$signature,
            ],
            'headers' => [
                'X-MBX-APIKEY' => 'ZM6HtzE7AxRTZOWKhNcJ3RQEhy0qypgWttr5ZEcXRxVYDgiGAlJlG0wc9qUBEJFr',
                
            ],]);
        $datacode = json_decode($response->getBody()->getContents(), true);
        

    }
    public function tokenlimit()
    {
        $time = Carbon::now()->timestamp.'000';
        $secret = 'bTMX1aGstZ44J27r38MhsSE3dFESb6tUYYbvcSpkUbM5FfB3eE2BCWclbSHS3Hg0';
        $signature = hash_hmac('sha256','baseToken=BNB&timestamp='.$time, $secret);
        $client = new Client();
        $response = $client->request('GET', 'https://api.binance.com/sapi/v1/giftcard/buyCode/token-limit', [
            'query' => [
                'baseToken' => 'BNB',
                'timestamp' =>$time,
                'signature'=>$signature,
            ],
            'headers' => [
                'X-MBX-APIKEY' => 'ZM6HtzE7AxRTZOWKhNcJ3RQEhy0qypgWttr5ZEcXRxVYDgiGAlJlG0wc9qUBEJFr',
                
            ],]);
        $data = json_decode($response->getBody()->getContents(), true);
        return $data;
    }
    public function price($token)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.binance.com/api/v3/ticker/price', [
            'query' => [
                'symbol' => $token,
            ],
            ]);
        $pricecoin = json_decode($response->getBody()->getContents(), true);
        return $pricecoin;
    }
}

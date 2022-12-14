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
        $times = Carbon::now()->timestamp;
        $time = $times.'000';
        $secret = 'bTMX1aGstZ44J27r38MhsSE3dFESb6tUYYbvcSpkUbM5FfB3eE2BCWclbSHS3Hg0';
        $signature = hash_hmac('sha256','referenceNo=0033001002103016&timestamp='.$time, $secret);
        $client = new Client();
        $response = $client->request('GET', 'https://api.binance.com/sapi/v1/giftcard/verify', [
            'query' => [
                'referenceNo' => '0033001002103016',
                'timestamp' =>$time,
                'signature'=>$signature,
            ],
            'headers' => [
                'X-MBX-APIKEY' => 'ZM6HtzE7AxRTZOWKhNcJ3RQEhy0qypgWttr5ZEcXRxVYDgiGAlJlG0wc9qUBEJFr',

            ],]);
        $data = json_decode($response->getBody()->getContents(), true);
        return $data;
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
        $data = json_decode($response->getBody()->getContents(), true);
        return $data;
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
}

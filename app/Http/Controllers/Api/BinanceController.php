<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class BinanceController extends Controller
{
    public function __construct(){
        $this->BS = ENV('BINANCE_SECRET');
        $this->BK = ENV('BINANCE_KEY');
    }
    public function verifcode(Request $request)
    {
        $time = Carbon::now()->timestamp.'000';
        $secret = $this->BS;
        $signature = hash_hmac('sha256','referenceNo='.$request->referenceNo.'&timestamp='.$time, $secret);
        $client = new Client();
        $response = $client->request('GET', 'https://api.binance.com/sapi/v1/giftcard/verify', [
            'query' => [
                'referenceNo' => $request->referenceNo,
                'timestamp' =>$time,
                'signature'=>$signature,
            ],
            'headers' => [
                'X-MBX-APIKEY' => $this->BK,
            ],]);
        $data_code = json_decode($response->getBody()->getContents());
        
        $data = json_decode(json_encode($data_code));
        if($data->data->valid == true)
        {
            $total = $this->price($data->data->token,$data->data->amount);
            return response()->json($total);
        }
        if($data->data->valid == false)
        {
            return response()->json([
                'status' => false,
                'message' => 'Code atau No.Refrensi Tidak Valid !',
            ]);
        }
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
    public function price($token,$amount)
    {
        $codevalue = $amount;
        $token = $token.'IDRT';
        $client = new Client();
        $response = $client->request('GET', 'https://api.binance.com/api/v3/ticker/price', [
            'query' => [
                'symbol' => $token,
            ],
            ]);
        $pricecoin = json_decode($response->getBody()->getContents(), true);
        
        $priceb = $pricecoin['price'] * 0.01 ;
        $price = $pricecoin['price'] - $priceb ;
        $codevalue = '1';
        $codecoin = $token;
        $total =$price * $codevalue;
        $fee = 5000;
        $withfee = $total - $fee;

        return $data = [
            'status' => true,
            'codevalue' => $codevalue,
            'codecoin' => $codecoin,
            'Market_Price' => $price,
            'Code Value' => $total,
            'fee' => $fee,
            'withfee' => $withfee,
        ];
    }
}

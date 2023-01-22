<?php

namespace App\Services;

use App\Models\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;
use GuzzleHttp\Client;
use Carbon\Carbon;

class GateValidate {
    public function countandsend($token,$amount,$bankcode,$bankaccount)
    {
        $price = $this->price($token,$amount);
        if($price['status'] == true){
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
                    'recipient_bank' => $bankcode,
                    'recipient_account' => $bankaccount,
                    'amount' => $price['withfee'],
                    'partner_trx_id'=>$txid,
                ]),
            ]);
            $data = json_decode($response->getBody()->getContents());
            return response()->json([
                'status'=>true,
                'message'=>'ok',
                'data'=>$data],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'error',
                'data'=>$price],200);
        }
    }
    public function price($token,$amount)
    {
        $codevalue = $amount;
        $codecoin = $token.'IDRT';
        $client = new Client();
        $response = $client->request('GET', 'https://api.binance.com/api/v3/ticker/price', [
            'query' => [
                'symbol' =>$codecoin,
            ],
            ]);
        $pricecoin = json_decode($response->getBody()->getContents(), true);
        
        $priceb = $pricecoin['price'] * 0.01 ; /// antisipasi selisih harga
        $price = $pricecoin['price'] - $priceb ;
        $total =$price * $codevalue;
        $fee = 5000;
        $withfee = $total - $fee;


        return $data = [
            'status' => true,
            'codevalue' => $codevalue,
            'codecoin' => $token,
            'market_price' => $price,
            'total_value' => number_format($total),
            'fee' => $fee,
            'withfee' => round($withfee),
        ];
    }
}
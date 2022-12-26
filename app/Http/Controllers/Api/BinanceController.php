<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Services\GateValidate;

class BinanceController extends Controller
{
    public function __construct(){
        $this->BS = ENV('BINANCE_SECRET');
        $this->BK = ENV('BINANCE_KEY');
        $this->GateValidate = new GateValidate();
    }
    public function verifcode(Request $request)
    {

        $time = Carbon::now()->timestamp.'000';
        $secret = ENV('BINANCE_SECRET');
        $signature = hash_hmac('sha256','referenceNo='.$request->referenceNo.'&timestamp='.$time, $secret);
        $client = new Client();
        try{
        $response = $client->request('GET', 'https://api.binance.com/sapi/v1/giftcard/verify', [
            'query' => [
                'referenceNo' => $request->referenceNo,
                'timestamp' =>$time,
                'signature'=>$signature,
            ],
            'headers' => [
                'X-MBX-APIKEY' => ENV('BINANCE_KEY'),
            ],]);
        $data_code = json_decode($response->getBody()->getContents());
        }catch(\Exception $e){
            return response()->json([
                'code'=>'014',
                'status' => false,
                'message' => 'Oopss! Ada yang salah,Tekan Tombol Reset dan Pastikan Semua Data Sudah Benar!<p>Jika Masih tidak bisa Silahkan hubungi ADMIN!</p>',
            ]);
        }
        
        $data = json_decode(json_encode($data_code));
        if($data->data->valid == true)
        {
            $total = $this->GateValidate->price($data->data->token,$data->data->amount);
            return response()->json([
                'status' => true,
                'message' => 'Code atau No.Refrensi Valid !',
                'data' => $total,
            ]);
        }
        if($data->data->valid == false)
        {
            return response()->json([
                'status' => false,
                'message' => 'Code atau No.Refrensi Tidak Valid ! ',
            ]);
        }
    }

    public function redeemcode(Request $request)
    {
        $time = Carbon::now()->timestamp.'000';
        
        $secret = $this->BS;
        $signature = hash_hmac('sha256','code='.$request->code.'&timestamp='.$time, $secret);
            $client = new Client();
            $response = $client->request('POST', 'https://api.binance.com/sapi/v1/giftcard/redeemCode', [
                'query' => [
                    'code' => $request->code,
                    'timestamp' =>$time,
                    'signature'=>$signature,
                ],
                'headers' => [
                    'X-MBX-APIKEY' => $this->BK,
                ],]);
            $datacode = json_decode($response->getBody()->getContents(), true);
            $data = json_decode(json_encode($datacode));
            
            if($data->success == true){
                $finaldata = $this->GateValidate->countandsend($data->data->token,$data->data->amount,$request->recipient_bank,$request->recipient_account);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'ADA YG ANEH NIHHHH!',
                ]);
            }            
            return $finaldata;
    }
    
    public function ipcheck(){
        $client = New Client();
        $response = $client->request('GET', 'https://api64.ipify.org');
        $data = json_decode($response->getBody()->getContents(), true);
        return response()->json([
            'status' => true,
            'message' => $data,
        ]);

    }
    
}

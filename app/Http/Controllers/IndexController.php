<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escrow;
class IndexController extends Controller
{
    public function index()
    {
        return view('navbar');
    }
    public function escrow()
    {
        return view('escrow.index');
    }
    public function escrowtransaction($escrow_id)
    {
        $data = Escrow::where('escrow_id',$escrow_id)->first();
        return view('escrow.transaction.index',compact('data'));
    }
}

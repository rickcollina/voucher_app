<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpecialOffer;
use DB;

class SpecialOfferController extends Controller
{
    public function index()
    {
       
        $specialoffers = SpecialOffer::all();


        return view('specialoffer', compact('specialoffers'));
          
    }

    public function show($id)
    {
       
        $specialoffers = SpecialOffer::findOrFail($id);

        $soAvailableVoucherCount = DB::table('vouchers')
                                    ->where('used', '=', 0)
                                    ->where('special_offer_id', '=', $specialoffers->id)
                                    ->count();

        $soUsedVoucherCount      = DB::table('vouchers')
                                    ->where('used', '=', 1)
                                    ->where('special_offer_id', '=', $id)
                                    ->count();

        return view('voucher', 
                    compact('specialoffers'), 
                    ["soAvailableVoucherCount"=>$soAvailableVoucherCount, "soUsedVoucherCount" => $soUsedVoucherCount]);
                   
          
    }

 

}

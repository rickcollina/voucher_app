<?php

namespace App\Http\Controllers;

use App\SpecialOffer;
use App\Voucher;
use App\Recipients;
use Carbon\Carbon;

use DB;

use Illuminate\Http\Request;

class VoucherController extends Controller
{
    
    public function create(Request $request, $id)
    {
        $specialOffer = SpecialOffer::find($id);
        $recipientsList = Recipients::all();
        
        foreach ($recipientsList as $recipient) {
            
            $voucher = new Voucher();
            
            $voucher->voucher_code = strtoupper(str_random(8));
            $voucher->used = 0;
            $voucher->special_offer_id = $specialOffer->id;
            $voucher->recipient_id = $recipient->idRecipients;   
           
            $dt = Carbon::now();
            $dt->addMonths(3); 

            $voucher->expires_at = $dt;


            $voucher->save();

        }

        return back();
    }


    public function validation(Request $request, $voucherCode, $recipientEmail)
    { 

        $recipientObject = Recipients::where('email', '=', $recipientEmail)->firstOrFail();

        $dt = Carbon::now();

        $voucherObject  = Voucher::where('voucher_code', '=', $voucherCode)
                                    ->where('recipient_id', '=', $recipientObject->idRecipients)
                                    ->firstOrFail();
                                   
        
        if($voucherObject->expires_at >= $dt)
        {
            if($voucherObject->used != 1 ){
               
                $voucherObject->used_at = $dt;
                $voucherObject->used = 1;
                
                $voucherObject->save();
    
                return response()->json($voucherObject, 201);

            }else{

                return response()->json("already used", 201);
            }
          
        }else{
            return response()->json($voucherObject, 404);
        }


      

    }
}

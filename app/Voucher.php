<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public function SpecialOffer()
    {
        return $this->belongsTo('App\SpecialOffer','id');
    }

    public function Recipients()
    {
        return $this->belongsTo('App\Recipients','recipient_id', 'idRecipients');
    }
}

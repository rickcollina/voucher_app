<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('voucher_code', 8);
            $table->integer('used');

            $table->integer('special_offer_id')->unsigned()->index();   
            $table->integer('recipient_id')->unsigned()->index();
            
            $table->dateTime('used_at');
            $table->dateTime('expires_at');

            $table->timestamps();
        });


        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}

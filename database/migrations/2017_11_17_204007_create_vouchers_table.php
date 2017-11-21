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
            
            $table->engine = 'InnoDB';  
            
            $table->increments('id');
            
            $table->string('voucher_code', 8);
            $table->integer('used');

            $table->integer('special_offer_id')->unsigned();   
            $table->integer('recipient_id')->unsigned();
            
            $table->dateTime('used_at');
            $table->dateTime('expires_at');

            $table->timestamps();

          
        });

        Schema::table('vouchers', function($table){

            $table->foreign('special_offer_id')->references('id')->on('special_offers');
            $table->foreign('recipient_id')->references('idRecipients')->on('recipients');

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

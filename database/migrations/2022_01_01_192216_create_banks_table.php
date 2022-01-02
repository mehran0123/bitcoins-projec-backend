<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('type')->comment(
                                            '1 = Local bank, 2 = Binance , 3 = Coin Base ,
                                             4 =Perfect Money , 5 = Skril , 6 = Paypal ,
                                             7 = Wechat , 8 = Amazon Pay , 9 = Google Pay ,
                                             10 = Apple Pay , 11 = American Express, 12 = Stripe,
                                             13 = Square , 14 = Visa Checkout,
                                            ');
            $table->string('account_no');
            $table->string('transection_fee')->nullable();
            $table->string('other_details')->nullable();
            $table->string('is_active')->nullable();
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
        Schema::dropIfExists('banks');
    }
}

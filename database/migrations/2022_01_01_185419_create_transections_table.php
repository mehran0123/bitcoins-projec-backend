<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transections', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->comment('1 = Withdraw, 2 = Deposit');
            $table->double('amount');
            $table->double('transection_fee')->comment('from bank module');
            $table->string('method')->comment('Bank,Bince,(From Bank module)');
            $table->integer('status')->default(0)->comment('0 = Pending,1 = Canceled , 2 = Completed');
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
        Schema::dropIfExists('transections');
    }
}

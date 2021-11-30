<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('id_card_number')->nullable();
            $table->string('email');
            $table->integer('sponcer_by')->default(0);
            $table->string('password')->nullable();
            $table->string('real_password')->nullable();
            $table->text('privacy_policy')->nullable();
            $table->integer('user_role')->default(2)->comment('1=admin, 2=user');
            $table->integer('is_active')->default(1)->comment('1=active, 0=deactive');
            $table->integer('status')->default(1)->comment('1=unblocked, 0=blocked');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

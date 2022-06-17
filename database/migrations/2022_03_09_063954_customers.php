<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $b) {
            $b->id();
            $b->string('email', 120)->unique();
            $b->string('first_name', 50);
            $b->string('last_name', 50)->nullable();
            $b->string('city', 100)->nullable();
            $b->string('address', 120)->nullable();
            $b->string('password', 200);
            $b->string('token', 64)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
};

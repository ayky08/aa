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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email')->unique();
            $table->string('password', 255);
            $table->string('bio', 400)->nullable();
            $table->string('image', 255)->default('dawn.png');
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('current_timestamp'));
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp'));
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
};

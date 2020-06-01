<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('phone')->nullable()->after("password");
            $table->integer('age')->nullable()->after("password");
            $table->integer('role')->default(0)->after("password");
            $table->string('address')->nullable()->after("password");
            $table->string('company')->nullable()->after("password");
        });
    }
}
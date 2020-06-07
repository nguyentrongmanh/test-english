<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClassRegisters extends Migration
{
    public function up()
    {
        Schema::create('class_registers', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("class_id");
        });
    }
}

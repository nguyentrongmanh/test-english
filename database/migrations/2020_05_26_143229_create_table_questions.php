<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer("listening_id")->nullable();
            $table->integer("reading_id")->nullable();
            $table->string("question")->nullable();
            $table->string("option_a")->nullable();
            $table->string("option_b")->nullable();
            $table->string("option_c")->nullable();
            $table->string("option_d")->nullable();
            $table->string("answer");
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
        Schema::dropIfExists('questions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTableTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('tests', function (Blueprint $table) {
            $table->integer('part_one_score')->nullable();
            $table->integer('part_two_score')->nullable();
            $table->integer('part_three_score')->nullable();
            $table->integer('part_four_score')->nullable();
            $table->integer('part_five_score')->nullable();
            $table->integer('part_six_score')->nullable();
            $table->integer('part_seven_score')->nullable();
        });
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
			$table->id();
			$table->integer("user_id");
			$table->integer("listening_score")->nullable();
			$table->integer("reading_score")->nullable();
			$table->integer("total_score")->nullable();
			$table->string("part_one_ids")->nullable();
			$table->string("part_two_ids")->nullable();
			$table->string("part_three_ids")->nullable();
			$table->string("part_four_ids")->nullable();
			$table->string("part_five_ids")->nullable();
			$table->string("part_six_ids")->nullable();
			$table->string("part_seven_ids")->nullable();
			$table->string("true_answer_part_one_ids")->nullable();
			$table->string("true_answer_part_two_ids")->nullable();
			$table->string("true_answer_part_three_ids")->nullable();
			$table->string("true_answer_part_four_ids")->nullable();
			$table->string("true_answer_part_five_ids")->nullable();
			$table->string("true_answer_part_six_ids")->nullable();
			$table->string("true_answer_part_seven_ids")->nullable();
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
        Schema::dropIfExists('table_tests');
    }
}

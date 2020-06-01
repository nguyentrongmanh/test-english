<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
			$table->id();
			$table->string("name")->nullable();
			$table->integer("target")->nullable();
			$table->string("address")->nullable();
			$table->string("schedule")->nullable();
			$table->string("description")->nullable();
			$table->integer("total_number")->nullable();
			$table->integer("register_number")->nullable();
			$table->integer("teacher_id");
			$table->boolean("close_flg")->default(false);
			$table->date("start_date");
			$table->date("end_date");
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
        Schema::dropIfExists('table_classes');
    }
}
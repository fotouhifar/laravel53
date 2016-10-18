<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('types', function (Blueprint $table) {

            $table->increments('id')->index();
            $table->string('lotto', 50);
            $table->string('draw_day', 10);
            $table->integer('winning_numbers');
            $table->integer('supplementary_numbers');
            $table->integer('max_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('types');
    }

}

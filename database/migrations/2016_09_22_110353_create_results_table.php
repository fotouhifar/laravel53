<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('results', function (Blueprint $table) {

            $table->increments('id')->index();
            $table->integer('type_id')->unsigned();

            $table->date('draw_date');
            $table->integer('draw_number');
            for ($i = 1; $i <= 10; $i++) {
                $table->string('wn' . $i, 2)->default('');
            }
            for ($i = 1; $i <= 5; $i++) {
                $table->string('sn' . $i, 2)->default('');
            }
        });
        Schema::table('results', function (Blueprint $table) {

            $table->timestamps();
            $table->foreign('type_id')
                    ->references('id')
                    ->on('types')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('results');
    }

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePercentatgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percentatges', function (Blueprint $table) {
            $table->id_percentage();
            $table->foreignId('id_course')->references('id_course')->on('courses');
            $table->foreignId('id_class')->references('id_class')->on('class');
            $table->float('continuous_assessment');
            $table->float('exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('percentatges');
    }
}

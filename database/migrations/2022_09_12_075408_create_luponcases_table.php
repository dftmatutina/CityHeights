<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuponcasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luponcases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('datefiled');
            $table->string('caseno')->unique();
            $table->string('complainant');
            $table->string('respondent');
            $table->string('casetitle');
            $table->integer('casenum');
            $table->enum('disposition', ['Settled', 'Dropped/Withdrawn']);
            $table->enum('caselevel', ['Conciliation', 'Mediation']);
            $table->string('link');
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
        Schema::dropIfExists('luponcases');
    }
}

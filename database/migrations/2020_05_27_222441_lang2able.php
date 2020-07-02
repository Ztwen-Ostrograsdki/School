<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * Class to manage the langage 2 Spain or Germany langage
 */
class Lang2able extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lang2ables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pupil_id');
            $table->foreign('pupil_id')
                  ->references('id')
                  ->on('pupils')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->morphs('lang2able');    
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
        //
    }
}

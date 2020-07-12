<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('classes', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->string('name');
            $table->string('level');
            $table->unsignedBigInteger('respo1')->nullable();
            $table->unsignedBigInteger('respo2')->nullable();
            $table->boolean('authorized')->default(false);
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable(); // The principal teacher of this class
            $table->unsignedBigInteger('year');
            $table->string('month');

            $table->foreign('respo1')
                  ->references('id')
                  ->on('pupils')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('respo2')
                  ->references('id')
                  ->on('pupils')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('teacher_id')
                  ->references('id')
                  ->on('teachers')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}

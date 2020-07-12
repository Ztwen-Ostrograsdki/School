<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('sexe');
            $table->string('contact')->nullable();
            $table->date('birth');
            $table->string('residence')->nullable();
            $table->string('level');
            $table->unsignedBigInteger('year');
            $table->string('month');
            $table->string('email');
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->boolean('parent')->default(false);
            $table->boolean('authorized')->default(false);
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id')
                  ->references('id')
                  ->on('subjects')
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
        Schema::dropIfExists('teachers');
    }
}

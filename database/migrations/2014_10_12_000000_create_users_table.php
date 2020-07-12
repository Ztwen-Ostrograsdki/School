<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $roles = ['user', 'admin', 'teacher', 'parent', 'master', 'superAdmin', 'admin-teacher', 'admin-teacher-parent', 'admin-parent', 'teacher-parent', 'superAdmin-parent', 'superAdmin-teacher', 'superAdmin-teacher-parent'];
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('title')->nullable();
            $table->string('creator')->nullable();
            $table->string('editor')->nullable();
            $table->boolean('authorized')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->enum('role', $roles)->default('user');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

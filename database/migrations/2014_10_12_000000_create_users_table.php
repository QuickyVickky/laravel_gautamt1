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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname',100);
            $table->string('lastname',100);
            $table->string('profile',100)->nullable()->default(NULL);
            $table->string('email')->unique();
            $table->string('mobile',15)->nullable()->default(NULL)->comment('optional');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('dob')->nullable()->default(NULL);
            $table->date('joining_date')->nullable()->default(NULL);
            $table->enum('gender', ['M', 'F', 'O'])->default('M');
            $table->decimal('salary', $precision = 11, $scale = 2)->default(0);
            $table->string('passport_document',100)->nullable()->default(NULL);
            $table->string('passport_number')->nullable()->default(NULL);
            $table->foreignId('department_id')->default(0);
            $table->foreignId('designation_id')->default(0);
            $table->tinyInteger('is_active')->default(1)->comment('1-active,0-deactive');
            $table->enum('type', ['Admin', 'Employee'])->default('Admin');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique();
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->foreign('campus_id')->references('id')->on('campus')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('password');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_num')->nullable();
            $table->date('dob')->nullable();
            $table->string('passport')->nullable();
            $table->string('ikad')->nullable();
            $table->text('add_id')->nullable();
            $table->text('add_my')->nullable();
            $table->string('cur_living')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->default(0)->nullable();
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
        Schema::dropIfExists('students');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 10)->nullable()->comment('Students unique code');
            $table->string('name', 50)->comment('Students name');
            $table->string('father_name', 50)->nullable()->comment('Students father name');
            $table->string('mother_name', 50)->nullable()->comment('Students mother name');
            $table->integer('school_id')->comment('School.id');
            $table->integer('from_school_id')->nullable()->comment('School from where the student has been transferred');
            $table->date('dob')->comment('Date of birth');
            $table->date('doj')->default(date('Y-m-d H:i:s'))->comment('Date of joining');
            $table->text('address')->nullable()->comment('students address');
            $table->integer('city_id')->nullable()->comment('city id');
            $table->integer('state_id')->nullable()->comment('state id');
            $table->integer('district_id')->nullable()->comment('district id');
            $table->integer('country_id')->nullable()->comment('country id');
            $table->integer('created_by')->comment('user id');
            $table->integer('updated_by')->nullable()->comment('user id');
            $table->tinyInteger('status')->default(0)->comment('0 inactive 1 active');
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
        Schema::dropIfExists('tbl_student');
    }
}

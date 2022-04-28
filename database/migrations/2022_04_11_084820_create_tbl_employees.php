<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employees', function (Blueprint $table) {
            $table->increments('emp_id');
            $table->string('emp_name', 50)->nullable()->comment('employee name');
            $table->integer('age')->comment('employee age');
            $table->string('gender', 10)->comment('employee gender');
            $table->date('dob')->comment('employee date of birth');
            $table->date('doj')->default(NOW())->comment('employee date of joining');
            $table->integer('dept')->comment('department id');
            $table->integer('city')->comment('city id');
            $table->integer('state')->comment('state id');
            $table->float('salary')->comment('Salary');
            $table->integer('created_by')->comment('user id');
            $table->softDeletes();
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
        Schema::dropIfExists('tbl_employees');
    }
}

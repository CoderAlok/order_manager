<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSchool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_school', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->comment('School unique code');
            $table->string('name')->comment('School name');
            $table->string('address1')->comment('address 1');
            $table->string('address2')->nullable()->comment('address 2');
            $table->integer('city_id')->nullable()->comment('city id from city table');
            $table->integer('district_id')->nullable()->comment('District id from district table');
            $table->integer('state_id')->nullable()->comment('State id from state table');
            $table->integer('country_id')->nullable()->comment('country id from state table');
            $table->integer('created_by')->comment('user id');
            $table->integer('updated_by')->nullable()->comment('user id');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_school');
    }
}

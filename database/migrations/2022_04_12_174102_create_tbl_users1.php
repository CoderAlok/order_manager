<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUsers1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users1', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 50)->comment('User name');
            $table->string('password', 255)->comment('Password');
            $table->string('name', 50)->comment('name');
            $table->string('email', 50)->comment('email');
            $table->string('phone', 20)->nullable()->comment('phone number');
            $table->softDeletes();
            $table->integer('created_by')->default(1);
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
        Schema::dropIfExists('tbl_users1');
    }
}

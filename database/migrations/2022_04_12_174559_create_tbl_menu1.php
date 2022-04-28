<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMenu1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_menu1', function (Blueprint $table) {
            $table->bigIncrements('menu_id');
            $table->integer('parent_id')->comment('0 means Parent, ID assigns a parent menu');
            $table->string('menu_name', 50)->comment('Menu name');
            $table->text('menu_desc')->comment('Menu description');
            $table->softDeletes();
            $table->integer('created_by')->comment('auth user id');
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
        Schema::dropIfExists('tbl_menu1');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAssignedMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_assigned_menu', function (Blueprint $table) {
            $table->bigIncrements('assigned_id');
            $table->integer('user_id')->comment('user id');
            $table->json('menus_respect_to_profile')->nullable()->default('')->comment('Menus id and name will be listed in json format');
            $table->json('menus_respect_to_user')->nullable()->default('')->comment('Menus id and name will be listed in json format');
            $table->boolean('is_enabled')->default(false)->comment('true for profile, false for user');
            $table->softDeletes();
            $table->integer('created_by')->comment('Auth user id');
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
        Schema::dropIfExists('tbl_assigned_menu');
    }
}

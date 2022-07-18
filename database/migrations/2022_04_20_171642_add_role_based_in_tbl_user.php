<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleBasedInTblUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_users1', function (Blueprint $table) {
            $table->tinyInteger('role_based')->default(0)->comment('0: user based, 1: role based')->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_users1', function (Blueprint $table) {
            $table->dropColumn('role_based');
        });
    }
}

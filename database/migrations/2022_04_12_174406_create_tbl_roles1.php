<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRoles1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_roles1', function (Blueprint $table) {
            $table->bigIncrements('role_id');
            $table->string('role_name', 50)->comment('Role names');
            $table->softDeletes();
            $table->integer('created_by')->default(1)->comment('auth user id');
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
        Schema::dropIfExists('tbl_roles1');
    }
}

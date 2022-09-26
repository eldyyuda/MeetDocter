<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->foreign('permision_id', 'fk_permision_role_to_permision')
                ->references('id')->on('permission')->onUpdate('Cascade')->onDelete('Cascade');
            $table->foreign('role_id', 'fk_permision_role_to_role')
            ->references('id')->on('role')->onUpdate('Cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign('fk_permision_role_to_permision');
            $table->dropForeign('fk_permision_role_to_role');
        });
    }
}

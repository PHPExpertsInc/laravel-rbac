<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $r = PHPExperts\LaravelRBAC\Models\Role::first();
        Schema::create('rbac_roles_permissions', function (Blueprint $table) {
            $table->char('role_id', 22)->index();
            $table->char('permission_id', 22)->index();
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')
                ->on('rbac_roles')
                ->onDelete('cascade');
            $table->foreign('permission_id')
                ->references('id')
                ->on('rbac_permissions')
                ->onDelete('cascade');

            $table->primary(['role_id', 'permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_role');
    }
}

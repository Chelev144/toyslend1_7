<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOptionsToRoleEnum extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('role', 'role_old');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'user', 'employee', 'supplier', 'new_option1', 'new_option2'])->after('role_old')->default('user');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_old');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('role', 'role_old');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'user', 'employee', 'supplier'])->after('role_old')->default('user');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_old');
        });
    }
}

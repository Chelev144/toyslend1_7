<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            // שינוי שם העמודה role ל-position
            $table->renameColumn('rool', 'position');
            
            // הוספת עמודת ENUM בשם employment_status עם הערכים 'full_time' ו-'part_time'
            $table->enum('employment_status', ['full_time', 'part_time'])->default('full_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            // החזרת שם העמודה position ל-role
            $table->renameColumn('position', 'rool');
            
            // מחיקת העמודה employment_status
            $table->dropColumn('employment_status');
        });
    }
};

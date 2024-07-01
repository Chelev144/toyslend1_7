<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            // וידוא שהעמודה קיימת לפני הוספת המפתח הזר
            if (Schema::hasColumn('payments', 'supplier_id')) {
                $table->unsignedBigInteger('supplier_id')->change();
                $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
        });
    }
};

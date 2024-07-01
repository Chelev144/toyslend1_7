
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
            // מחיקת העמודה position וכל האינדקסים המשויכים אליה
         #   $table->dropIfExists('position');
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
            // שחזור העמודה position
        #    $table->string('position');
        });

        // שחזור שוב של האינדקסים המשויכים לעמודה position
        Schema::table('employees', function (Blueprint $table) {
           # $table->unique('position');
        });
    }
};


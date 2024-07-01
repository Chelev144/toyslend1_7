<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
          #  $table->id();
          #  $table->decimal('amount', 10, 2);
          #  $table->date('payment_date');
          #  $table->unsignedBigInteger('supplier_id');
          #  $table->timestamps();

            // Foreign key constraint
          #  $table->foreign('supplier_id')->references('id')->on('suppliers')
           #     ->onDelete('cascade'); // Delete payments if supplier is deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            #$table->dropForeign(['supplier_id']);
        });

        Schema::dropIfExists('payments');
    }
}

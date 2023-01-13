<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->string('payment_type', 50); // Enum ('course','enrollment','invoices' ...)
            $table->unsignedBigInteger('paymentable_id');
            $table->string('paymentable_type', 50);
            $table->double('amount');
            $table->date('date');
            $table->string('method', 50);
            $table->string('remark', 255)->nullable();

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
        Schema::dropIfExists('payments');
    }
};

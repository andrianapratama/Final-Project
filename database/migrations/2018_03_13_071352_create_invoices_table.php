/*<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('userID')->unsigned();
            $table->uuid('orderID')->unsigned();
            $table->integer('totalPrice')->unsigned();;
            $table->date('orderDate');
            $table->string('paymentType');
            $table->string('paymentStatus');
            $table->string('orderStatus');
            $table->timestamps();
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('orderID')->references('id')->on('carts')->onDelete('cascade');
        });

        DB::statement('ALTER TABLE invoices ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}

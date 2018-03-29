<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('productID')->unsigned();
            $table->uuid('userID')->unsigned();
            $table->integer('orderID')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('totalPrice')->unsigned();
            $table->date('orderDate');
            $table->string('paymentType');
            $table->string('orderStatus');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('productID')->references('id')->on('product_details')->onDelete('cascade');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE transactions ALTER COLUMN id SET DEFAULT uuid_generate_v4();');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

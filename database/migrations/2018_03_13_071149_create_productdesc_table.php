<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductdescTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productdesc', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('descID')->unsigned();
            $table->integer('size')->unsigned();
            $table->integer('stock')->unsigned();
            $table->timestamps();
            $table->foreign('descID')->references('id')->on('product_details')->onDelete('cascade');
        });
        
        DB::statement('ALTER TABLE productdesc ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productdesc');
    }
}

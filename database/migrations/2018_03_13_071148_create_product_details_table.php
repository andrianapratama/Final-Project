<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('categoryID')->unsigned();
            $table->string('brand');
            $table->string('name');
            $table->decimal('price')->unsigned();
            $table->string('image');
            $table->string('description');
            $table->string('material');
            $table->timestamps();
            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade');
        });

        DB::statement('ALTER TABLE product_details ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
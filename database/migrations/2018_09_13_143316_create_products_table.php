<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string( 'no' );
            $table->string( 'name' );
            $table->text( 'description' );
            $table->string( 'price' );
            $table->string( 'picture' )->nullable();
            $table->string( 'picture1' )->nullable();
            $table->string( 'picture2' )->nullable();
            $table->json( 'sizes' );
            $table->json( 'colors' );
            $table->boolean( 'stock' );
            $table->boolean( 'status' );
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
        Schema::dropIfExists('products');
    }


}

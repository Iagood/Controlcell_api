<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('code')->unique();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('description');
            $table->decimal('product_cost', 8, 2);
            $table->decimal('sale_price', 8, 2);
            $table->integer('guarantee_months');
            $table->text('observation')->nullable();
            $table->float('commission', 8, 2);
            $table->string('image')->nullable();
            $table->integer('minimum_inventory');
            $table->integer('current_inventory');
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

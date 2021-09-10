<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->bigInteger('cpf')->nullable()->unique();
            $table->bigInteger('rg')->nullable()->unique();
            $table->bigInteger('cnpj')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->integer('ddd_cellphone');
            $table->bigInteger('cellphone');
            $table->integer('ddd_telephone')->nullable();
            $table->bigInteger('telephone')->nullable();
            $table->integer('cep');
            $table->char('uf',2);
            $table->string('public_place');
            $table->string('city');
            $table->string('county');
            $table->string('complement')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

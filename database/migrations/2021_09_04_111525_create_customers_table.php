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
            $table->string('name');
            $table->string('cpf')->nullable()->unique();
            $table->string('rg')->nullable()->unique();
            $table->string('cnpj')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('cellphone');
            $table->string('telephone')->nullable();
            $table->string('cep');
            $table->string('uf');
            $table->string('public_place');
            $table->string('city');
            $table->string('county');
            $table->string('complement')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('customers');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unit_name');
            $table->decimal('rent_price', 15, 2);
            $table->string('unit_size')->nullable();
            $table->integer('number_of_bedrooms')->nullable();
            $table->integer('number_of_kitchens')->nullable();
            $table->integer('number_of_bathrooms')->nullable();
            $table->decimal('market_rent', 15, 2)->nullable();
            $table->decimal('deposit_amount', 15, 2)->nullable();
            $table->string('parking_type')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

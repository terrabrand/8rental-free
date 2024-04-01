<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('brand_name')->nullable();
            $table->string('model_number')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('serial_number')->nullable();
            $table->date('warranty_expiration')->nullable();
            $table->longText('equipment_details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

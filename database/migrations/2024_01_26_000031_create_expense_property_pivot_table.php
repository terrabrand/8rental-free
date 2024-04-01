<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensePropertyPivotTable extends Migration
{
    public function up()
    {
        Schema::create('expense_property', function (Blueprint $table) {
            $table->unsignedBigInteger('expense_id');
            $table->foreign('expense_id', 'expense_id_fk_9430155')->references('id')->on('expenses')->onDelete('cascade');
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id', 'property_id_fk_9430155')->references('id')->on('properties')->onDelete('cascade');
        });
    }
}

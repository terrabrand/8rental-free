<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePropertyPivotTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_property', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id', 'invoice_id_fk_9430191')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id', 'property_id_fk_9430191')->references('id')->on('properties')->onDelete('cascade');
        });
    }
}

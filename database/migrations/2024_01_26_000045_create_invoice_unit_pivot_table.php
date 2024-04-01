<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceUnitPivotTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id', 'invoice_id_fk_9430193')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id', 'unit_id_fk_9430193')->references('id')->on('units')->onDelete('cascade');
        });
    }
}

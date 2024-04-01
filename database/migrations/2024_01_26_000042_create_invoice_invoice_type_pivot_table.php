<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceInvoiceTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_invoice_type', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id', 'invoice_id_fk_9430190')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedBigInteger('invoice_type_id');
            $table->foreign('invoice_type_id', 'invoice_type_id_fk_9430190')->references('id')->on('invoice_types')->onDelete('cascade');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceSectionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_section', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id', 'invoice_id_fk_9430192')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id', 'section_id_fk_9430192')->references('id')->on('sections')->onDelete('cascade');
        });
    }
}

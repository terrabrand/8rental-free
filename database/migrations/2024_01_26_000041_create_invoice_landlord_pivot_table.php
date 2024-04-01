<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceLandlordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_landlord', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id', 'invoice_id_fk_9430189')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedBigInteger('landlord_id');
            $table->foreign('landlord_id', 'landlord_id_fk_9430189')->references('id')->on('landlords')->onDelete('cascade');
        });
    }
}

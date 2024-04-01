<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTenantPivotTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_tenant', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id', 'invoice_id_fk_9430188')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id', 'tenant_id_fk_9430188')->references('id')->on('tenants')->onDelete('cascade');
        });
    }
}

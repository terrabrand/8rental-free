<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTenantPivotTable extends Migration
{
    public function up()
    {
        Schema::create('document_tenant', function (Blueprint $table) {
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id', 'document_id_fk_9430173')->references('id')->on('documents')->onDelete('cascade');
            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id', 'tenant_id_fk_9430173')->references('id')->on('tenants')->onDelete('cascade');
        });
    }
}

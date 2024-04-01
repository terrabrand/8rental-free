<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseTenantPivotTable extends Migration
{
    public function up()
    {
        Schema::create('expense_tenant', function (Blueprint $table) {
            $table->unsignedBigInteger('expense_id');
            $table->foreign('expense_id', 'expense_id_fk_9430164')->references('id')->on('expenses')->onDelete('cascade');
            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id', 'tenant_id_fk_9430164')->references('id')->on('tenants')->onDelete('cascade');
        });
    }
}

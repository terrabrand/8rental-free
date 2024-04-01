<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('property_applying_id')->nullable();
            $table->foreign('property_applying_id', 'property_applying_fk_9430218')->references('id')->on('properties');
            $table->unsignedBigInteger('unit_applying_id')->nullable();
            $table->foreign('unit_applying_id', 'unit_applying_fk_9430217')->references('id')->on('units');
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->foreign('tenant_id', 'tenant_fk_9438250')->references('id')->on('tenants');
        });
    }
}

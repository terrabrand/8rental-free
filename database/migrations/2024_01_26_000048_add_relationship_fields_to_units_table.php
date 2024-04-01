<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUnitsTable extends Migration
{
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->unsignedBigInteger('property_id')->nullable();
            $table->foreign('property_id', 'property_fk_9437968')->references('id')->on('properties');
            $table->unsignedBigInteger('unit_section_id')->nullable();
            $table->foreign('unit_section_id', 'unit_section_fk_9430102')->references('id')->on('sections');
        });
    }
}

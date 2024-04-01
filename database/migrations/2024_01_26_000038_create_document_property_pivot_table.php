<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentPropertyPivotTable extends Migration
{
    public function up()
    {
        Schema::create('document_property', function (Blueprint $table) {
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id', 'document_id_fk_9430175')->references('id')->on('documents')->onDelete('cascade');
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id', 'property_id_fk_9430175')->references('id')->on('properties')->onDelete('cascade');
        });
    }
}

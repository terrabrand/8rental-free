<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentUnitPivotTable extends Migration
{
    public function up()
    {
        Schema::create('document_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id', 'document_id_fk_9430176')->references('id')->on('documents')->onDelete('cascade');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id', 'unit_id_fk_9430176')->references('id')->on('units')->onDelete('cascade');
        });
    }
}

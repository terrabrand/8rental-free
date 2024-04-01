<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentDocumentTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('document_document_type', function (Blueprint $table) {
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id', 'document_id_fk_9430180')->references('id')->on('documents')->onDelete('cascade');
            $table->unsignedBigInteger('document_type_id');
            $table->foreign('document_type_id', 'document_type_id_fk_9430180')->references('id')->on('document_types')->onDelete('cascade');
        });
    }
}

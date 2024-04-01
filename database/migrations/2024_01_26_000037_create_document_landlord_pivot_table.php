<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentLandlordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('document_landlord', function (Blueprint $table) {
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id', 'document_id_fk_9430174')->references('id')->on('documents')->onDelete('cascade');
            $table->unsignedBigInteger('landlord_id');
            $table->foreign('landlord_id', 'landlord_id_fk_9430174')->references('id')->on('landlords')->onDelete('cascade');
        });
    }
}

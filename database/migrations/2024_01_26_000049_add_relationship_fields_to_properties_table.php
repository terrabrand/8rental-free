<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPropertiesTable extends Migration
{
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->unsignedBigInteger('landlord_id')->nullable();
            $table->foreign('landlord_id', 'landlord_fk_9430108')->references('id')->on('landlords');
        });
    }
}

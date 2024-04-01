<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintainerPropertyPivotTable extends Migration
{
    public function up()
    {
        Schema::create('maintainer_property', function (Blueprint $table) {
            $table->unsignedBigInteger('maintainer_id');
            $table->foreign('maintainer_id', 'maintainer_id_fk_9430124')->references('id')->on('maintainers')->onDelete('cascade');
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id', 'property_id_fk_9430124')->references('id')->on('properties')->onDelete('cascade');
        });
    }
}

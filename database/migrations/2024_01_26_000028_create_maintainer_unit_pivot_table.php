<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintainerUnitPivotTable extends Migration
{
    public function up()
    {
        Schema::create('maintainer_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('maintainer_id');
            $table->foreign('maintainer_id', 'maintainer_id_fk_9430122')->references('id')->on('maintainers')->onDelete('cascade');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id', 'unit_id_fk_9430122')->references('id')->on('units')->onDelete('cascade');
        });
    }
}

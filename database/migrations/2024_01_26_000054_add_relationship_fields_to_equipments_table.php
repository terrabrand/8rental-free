<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEquipmentsTable extends Migration
{
    public function up()
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->unsignedBigInteger('equipment_type_id')->nullable();
            $table->foreign('equipment_type_id', 'equipment_type_fk_9430233')->references('id')->on('equipment_types');
        });
    }
}

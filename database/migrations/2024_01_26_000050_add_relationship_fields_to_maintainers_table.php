<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMaintainersTable extends Migration
{
    public function up()
    {
        Schema::table('maintainers', function (Blueprint $table) {
            $table->unsignedBigInteger('section_assigned_id')->nullable();
            $table->foreign('section_assigned_id', 'section_assigned_fk_9438404')->references('id')->on('sections');
        });
    }
}

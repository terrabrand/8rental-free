<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseUnitPivotTable extends Migration
{
    public function up()
    {
        Schema::create('expense_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('expense_id');
            $table->foreign('expense_id', 'expense_id_fk_9430156')->references('id')->on('expenses')->onDelete('cascade');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id', 'unit_id_fk_9430156')->references('id')->on('units')->onDelete('cascade');
        });
    }
}

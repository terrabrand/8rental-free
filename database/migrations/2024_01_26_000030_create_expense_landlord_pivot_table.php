<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseLandlordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('expense_landlord', function (Blueprint $table) {
            $table->unsignedBigInteger('expense_id');
            $table->foreign('expense_id', 'expense_id_fk_9430154')->references('id')->on('expenses')->onDelete('cascade');
            $table->unsignedBigInteger('landlord_id');
            $table->foreign('landlord_id', 'landlord_id_fk_9430154')->references('id')->on('landlords')->onDelete('cascade');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseExpenseTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('expense_expense_type', function (Blueprint $table) {
            $table->unsignedBigInteger('expense_id');
            $table->foreign('expense_id', 'expense_id_fk_9430157')->references('id')->on('expenses')->onDelete('cascade');
            $table->unsignedBigInteger('expense_type_id');
            $table->foreign('expense_type_id', 'expense_type_id_fk_9430157')->references('id')->on('expense_types')->onDelete('cascade');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('responsible')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->date('date_of_expense');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

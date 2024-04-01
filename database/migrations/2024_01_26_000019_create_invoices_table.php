<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('invoice_number')->nullable();
            $table->date('date')->nullable();
            $table->date('date_due')->nullable();
            $table->decimal('partial_amount', 15, 2)->nullable();
            $table->decimal('amount', 15, 2);
            $table->decimal('tax', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->date('date_paid')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

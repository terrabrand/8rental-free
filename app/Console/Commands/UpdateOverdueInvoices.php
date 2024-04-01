<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use App\Models\Invoice;



class UpdateOverdueInvoices extends Command
{
    protected $signature = 'invoices:update-overdue';

    protected $description = 'Update status of overdue invoices';

    public function handle()
    {
        // Find all partial invoices where the date due is in the past
        $overdueInvoices = Invoice::where('status', 'Partial')
            ->whereDate('date_due', '<', now())
            ->get();

        // Update status of found invoices to "Overdue"
        foreach ($overdueInvoices as $invoice) {
            $invoice->status = 'Overdue';
            $invoice->save();
        }

        $this->info('Overdue invoices updated successfully.');
    }
}

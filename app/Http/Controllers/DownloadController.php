<?php

namespace App\Http\Controllers;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    //
    public function down(){
        $customer = new Buyer([
            'name'          => 'John Doe',
            'custom_fields' => [
                'email' => 'test@example.com',
            ],
        ]);
    
        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);
    
        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
           
            ->addItem($item);
    
        return $invoice->stream();
    }
    
    
}

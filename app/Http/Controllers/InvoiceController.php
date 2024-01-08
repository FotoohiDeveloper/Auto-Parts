<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show()
    {
        $invoices = Invoice::where('user_id', auth()->user()->id)->get();
        return view('panel.invoices', compact('invoices'));
    }
}

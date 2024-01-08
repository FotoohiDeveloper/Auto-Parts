<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::where('role', 0)->get();
        return view('panel.allUser', compact('users'));
    }

    public function invoices()
    {
        $invoices = Invoice::all();
        return view('panel.allInvoices', compact('invoices'));
    }

    public function changeStatus($id)
    {
        $invoice = Invoice::where('id', $id)->first();
        if ($invoice)
        {
            $invoice->status = 1;
            $invoice->save();
        }
        return redirect()->back();
    }
}

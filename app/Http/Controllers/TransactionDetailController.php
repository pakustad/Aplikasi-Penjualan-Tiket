<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionDetail;
use App\Tiket;

class TransactionDetailController extends Controller
{
    public function store(Request $request)
    {
        $transactionDetail = new TransactionDetail();
        // Get price of ticket
        $ticketID = $request->input("ticket");
        $ticketPrice = Tiket::where("id", $ticketID)->pluck("harga_tiket")->first();
        // Filling properties 
        $transactionDetail->transaction_id = $request->input("transaction_id");
        $transactionDetail->ticket_id = $ticketID;
        $transactionDetail->price = $ticketPrice;
        $transactionDetail->qty = $request->input("qty");
        $transactionDetail->save();
        return redirect(route("transactions.new"));
    }

    public function delete($id)
    {
        TransactionDetail::destroy($id);
        return redirect(route("transactions.new"));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Tiket;
use App\TransactionDetail;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::all();
        return view("transactions.index", compact("transactions"));
    }

    public function create()
    {
        // Create new transactions if session transactionID is null
        if (is_null(session("transactionID"))) {
            $latestTransaction = Transaction::whereYear("created_at", 2022)->orderBy("id", "DESC")->first();
            $invCode = null;
            if (empty($latestTransaction)) {
                $invCode = date("d-m-Y") . "-" . "1" . "-" . uniqid();
            } else {
                $currentCode = explode("-", $latestTransaction->inv_code)[3];
                $invCode = date("d-m-Y") . "-" . ++$currentCode . "-" . uniqid();
            }
            // Create new transaction
            $transaksi = new Transaction;
            $transaksi->inv_code = $invCode;
            $transaksi->status = "0";
            $transaksi->save();
            // Saving id as session
            session()->put("transactionID", $transaksi->id);
            session()->save();
        }

        return redirect(route("transactions.new"));
    }

    public function new()
    {
        $transactionID = session("transactionID");
        $tickets = Tiket::all();
        $transactions = TransactionDetail::where("transaction_id", $transactionID)->get();
        return view("transactions.new", compact("transactions", "tickets"));
    }

    public function checkout(Request $request, $id)
    {
        $transactionID = session("transactionID");
        $transaction = Transaction::find($transactionID);
        $transaction->status = "1";
        $transaction->grand_total = $request->input("grand_total");
        $transaction->discount = $request->input("discount");
        $transaction->money_paid = $request->input("money_paid");
        $transaction->change = $request->input("change");
        $transaction->save();
        session()->forget("transactionID");
        session()->save();
        return redirect(route("transactions"));
    }

    public function rollback($id)
    {
        $transaction = Transaction::find($id);
        // Delete transaction details
        TransactionDetail::destroy($transaction->transactionDetails->pluck("id")->all());
        // Delete transaction
        Transaction::destroy($id);
        session()->forget("transactionID");
        session()->save();
        return redirect(route("transactions"));
    }

    public function print($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transactionDetails = TransactionDetail::where("transaction_id", $id)->get();
        return view("transactions.print", compact("transaction", "transactionDetails"));
    }
}

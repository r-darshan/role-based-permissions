<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHistory;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        $tHistory = TransactionHistory::paginate(config('constants.paginate.itemcount'));
        
        return view('transaction-history.view-all', compact('tHistory'));
    }
}

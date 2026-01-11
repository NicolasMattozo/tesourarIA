<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Cashbox;
use App\Models\FinancialSector;
use App\Models\Event;
use App\Services\TransactionService;
use App\Models\Transaction;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['paymentMethod', 'cashbox', 'user', 'event'])->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paymentMethods = PaymentMethod::all();
        $cashbox = Cashbox::all();
        $financialSector = FinancialSector::all();
        $events = Event::all();

        return view('transactions.create', compact('paymentMethods', 'cashbox', 'financialSector', 'events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, TransactionService $service)
    {
        $validated = $request->validate([
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
            'financial_sector_id' => 'nullable|exists:financial_sectors,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'cashbox_id' => 'required|exists:cashboxes,id',
            'user_id' => 'nullable|exists:users,id',
            'event_id' => 'nullable|exists:events,id',
        ]);


        $service->create($validated);

        return redirect()->back()->with('success', 'Movimentação registrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

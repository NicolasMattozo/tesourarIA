<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\BusPassenger;
use App\Models\User;

use App\Models\Event;
use App\Models\Transaction;

class BusPassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Bus $bus)
    {
        // passageiros do ônibus

        $bus = Bus::with('event')->find($bus->id);
        $passengers = $bus->passengers()->with('user')->get();
        $candidates = User::whereHas('events', function ($q) use ($bus) {
            $q->where('events.id', $bus->event_id);
        })
            ->whereDoesntHave('busPassengers', function ($q) use ($bus) {
                $q->where('bus_id', $bus->id);
            })
            ->withSum(['transactions as total_paid' => function ($q) use ($bus) {
                $q->where('event_id', $bus->event_id)
                    ->where('type', 'income');
            }], 'amount')
            ->orderByDesc('total_paid')
            ->get();

        $event = Event::find($bus->event_id);

        return view('bus.passengers.index', compact(
            'bus',
            'passengers',
            'candidates',
            'event'
        ));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bus.passengers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Bus $bus)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Verifica se o passageiro já está no ônibus
        $existingPassenger = BusPassenger::where('bus_id', $bus->id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($existingPassenger) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'O passageiro já está neste ônibus.'], 422);
            }
            return redirect()->back()->withErrors(['user_id' => 'O passageiro já está neste ônibus.']);
        }

        // Verifica se o ônibus está cheio
        $passengerCount = BusPassenger::where('bus_id', $bus->id)->count();
        if ($passengerCount >= $bus->capacity) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'O ônibus está cheio.'], 422);
            }
            return redirect()->back()->withErrors(['error' => 'O ônibus está cheio.']);
        }

        BusPassenger::create([
            'bus_id' => $bus->id,
            'user_id' => $request->user_id,
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Passageiro adicionado com sucesso.']);
        }

        return redirect()->route('bus.passengers.index', ['bus' => $bus->id])
            ->with('success', 'Passageiro adicionado com sucesso.');
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
    public function destroy(Request $request, Bus $bus, $userId)
    {
        $passenger = BusPassenger::where('bus_id', $bus->id)
            ->where('user_id', $userId)
            ->first();

        if (!$passenger) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Passageiro não encontrado.'], 404);
            }
            return redirect()->back()->withErrors(['error' => 'Passageiro não encontrado.']);
        }

        $passenger->delete();

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Passageiro removido com sucesso.']);
        }

        return redirect()->route('bus.passengers.index', ['bus' => $bus->id])
            ->with('success', 'Passageiro removido com sucesso.');
    }
}

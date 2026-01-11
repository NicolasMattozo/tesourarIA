<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($eventId)
    {
        $event = Event::with('users')->findOrFail($eventId);
        $users = User::all();
        $participants = $event->users;


        return view('events.participants.index', [
            'event' => $event,
            'participants' => $participants,
            'users' => $users
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $userIds = $request->input('participants', []);
        $event->users()->sync($userIds);

        return redirect()->route('event.participants.index', $event->id)
                         ->with('success', 'Participantes atualizados com sucesso.');
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

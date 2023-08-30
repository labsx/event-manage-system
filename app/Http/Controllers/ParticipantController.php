<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParticipantController extends Controller
{
    public function view()
    {
        $events = Event::all();

        return view ('participants.register-event', ['events' => $events]);
    }

    public function add(Request $request)
    {
        $maxUsers = 3;
        $this->validate($request, [
            'email' => ['required','email',
        Rule::unique('participants'),
            function ($attribute, $value, $fail) use ($maxUsers) {
                if (Participant::count() >= $maxUsers) {
                    $fail("Participant reached the limit.");
                }
                },
            ],
        ]);
 
        Participant::create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'event' => $request->input('event')
        ]);
    
        return back()->with('message', 'Participant registration success!.');
    }   
}

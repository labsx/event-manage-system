<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Rules\UniqueIdEventCombination;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        return view('home', [
            'posts' => Event::latest()
            ->where('name', $request->get('search'))
            ->paginate(4)
        ]); 
    }

    public function view()
    {
        $events = Event::all();
        $users = Participant::all();

        return view ('participants.register-event', ['events' => $events], ['users' => $users]);
    }

    public function add(Request $request)
    {
        
        $validatedData = $request->validate([
            'user_id' => ['required', 'integer'],
            'event' => ['required', 'string'],
            'email' => ['required', 'email'],
            'name' => ['required', 'string'],
        ]);
    
        $id = $validatedData['user_id'];
        $event = $validatedData['event'];
    
        $existingParticipant = Participant::where('user_id', $id)
                                          ->where('event', $event)
                                          ->first();
    
        if ($existingParticipant) {
            return back()->with('message', 'You are already registered to this event!');
        }
    
        $maxParticipants = 2; 
        $currentParticipants = Participant::where('event', $event)->count();
    
        if ($currentParticipants >= $maxParticipants) {
            return back()->with('message', 'Participants limit reach !.');
        }

        Participant::create($validatedData);
    
        return back()->with('message', 'Event registration successfully');
    }

    public function list(Request $request)
    {
        return view('participants.participants-list', [
            'posts' => Event::latest()
            ->where('name', $request->get('search'))
            ->paginate(4)
        ]); 
    }

    public function delete(Participant $post)
    {
            $post->delete();
            
            return back()->with('message', 'Deleted Successfully');
    }

    public function cancel(Participant $post)
    {
            $post->delete();
            
            return back()->with('message', 'Cancel Successfully');
    }

    public function event()
    {
        $user = Auth::user();
        $posts = $user->posts;

        return view('participant-event-registration', ['posts' => $posts]);
    }

}

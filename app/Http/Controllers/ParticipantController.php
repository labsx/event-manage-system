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
        $user = Auth::user();
        $posts = $user->posts;
        $events = Event::all();

        return view('home', ['posts' => $posts], ['events' => $events]);
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
    
        $maxParticipants = Event::max('number');
        $currentParticipants = Participant::where('event', $event)->count();
    
        if ($currentParticipants >= $maxParticipants) {
            return back()->with('message', 'Participants limit reach !.');
        }

        Participant::create($validatedData);
    
        return back()->with('message', 'Event registration successfully');
    }

    public function list(Request $request)
    {
        $query = $request->input('search');
        
        $queryBuilder = Participant::query();

        if ($query) {
            $queryBuilder->where('name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like','%'. request('search'). '%')
                ->orWhere('event', 'like','%'. request('search'). '%');
        }

        $posts = $queryBuilder->paginate(5);

        return view('participants.participants-list', compact('posts'));
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
}

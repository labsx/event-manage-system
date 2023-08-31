<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function view()
    {
        $events = Event::all();
        $users = Participant::all();

        return view ('participants.register-event', ['events' => $events], ['users' => $users]);
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
            'user_id' => $request->input('id'),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'event' => $request->input('event')
        ]);
    
        return back()->with('message', 'Participant registration success!.');
    }   

    public function list()
    {
        return view('participants.participants-list', [
            'posts' => Participant::latest()->filter(request([ 'search']))->paginate(6)
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

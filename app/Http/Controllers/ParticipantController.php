<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParticipantController extends Controller
{
    public function view()
    {

        $events = Event::all();
        $posts = Participant::all();

        return view ('participants.register-event', ['events' => $events], ['posts' => $posts]);
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
}

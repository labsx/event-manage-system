<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    public function index()
    {
        return view('admin');
    }
     
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('events', 'name')],
            'venue' => ['required', 'max:255', 'min:8'],
            'description' => ['required','min:10', 'max:255'], 
            'date' => 'required', 
            'number' => 'required', 
        ]);

        if($request->hasFile('picture')){
            $formFields['picture'] = $request->file('picture')
                ->store('picture', 'public');
        }        
        
        Event::create($formFields);

        return back()
            ->with('message', 'Event created successfully!');
    }

    public function show()
    {
        $posts = Event::latest()->get();

        return view('event-list',['posts' => $posts]);
    }

    public function edit($id)
    {
        $data = Event::findOrFail($id);
        return view('edit-event',['post' => $data]);
    }

    public function update(Request $request, Event $post)
    {
        $formFields = $request->validate([
            'name' => 'required', 
            'venue' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('picture')){
            $formFields['picture'] = $request->file('picture')
                ->store('picture', 'public');
        }        
        
        $post->update($formFields);

        return back()
            ->with('message', 'Event data successfully edited!');
    }

    public function delete(Event $post)
    {
        $post->delete();
        return back()->with('message', 'Deleted Successfully');
    }
}

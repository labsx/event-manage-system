<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('events', 'name')],
            'venue' => 'required',
            'description' => 'required',
           
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
}

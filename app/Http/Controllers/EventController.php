<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    public function welcome()
    {
        return view('dashboard', [
            'posts' => Event::latest()->filter(request([ 'search']))->paginate(4)
        ]);
    }
    
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

    public function userShow()
    {
        return view ('auth.admin-user');
    }

    public function userAdd(Request $request)
    {
       
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3', Rule::unique('users', 'email')],
            'password' => ['required','min:5'],
            'is_admin' => ['required'],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        
        User::create($formFields);

        return back()->with('message', 'User data successfully created!');
    }
}

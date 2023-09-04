<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function welcome(Request $request)
    {    
        $query = $request->input('search');
        
        $queryBuilder = Event::query();

        if ($query) {
            $queryBuilder->where('name', 'like', '%' . $query . '%')
                ->orWhere('venue', 'like','%'. request('search'). '%')
                ->orWhere('description', 'like','%'. request('search'). '%');
        }

        $posts = $queryBuilder->paginate(4);

        return view('dashboard', compact('posts'));
    }

    public function eventData($id)
    {
        $posts = Event::findOrFail($id);
        return view ('dashboard-data', ['posts' => $posts]);
    }
}

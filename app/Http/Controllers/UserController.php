<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function show()
    {
        return view ('auth.admin-user');
    }

    public function create(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3', Rule::unique('users', 'email')],
            'password' => ['required','min:5'],
            'is_admin' => ['required'],
        ]);

        $formFields['password'] = Hash::make($formFields['password']);
        
        User::create($formFields);

        return back()->with('message', 'User data successfully created!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }

    public function store(Request $request)

    {
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3']
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        if (!$user) {
            return redirect()->route('registration')->with('error', 'Register Failed');
        }
        return redirect()->route('login');
    }

    public function login()
    {
        return view('users.login');
    }

    public function loginPost(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('todos.index')->with('message', 'You are now Logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

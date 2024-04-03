<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class RegisterController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Register/RegisterCreate');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = User::create($request->validate([
            'username' => 'required|unique:users',
            'firstname' => 'required|string|max:32',
            'lastname' => 'required|string|max:32',
            'birthday' => 'required|date',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]));
        Auth::login($user);

        return redirect()->route('address.create')->with('success', 'Usuario registrado');
    }
}

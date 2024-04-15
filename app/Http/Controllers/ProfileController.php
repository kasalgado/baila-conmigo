<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function index(): Response
    {
        $user = auth()->user();

        return Inertia::render('Profile/ProfileIndex', [
            'user' => $user,
            'address' => $user->address,
            'fromUser' => null,
        ]);
    }

    public function show(int $id): Response
    {
        $user = User::find($id);

        return Inertia::render('Profile/ProfileIndex', [
            'user' => $user,
            'address' => $user->address,
            'fromUser' => Auth::user() !== $user ? Auth::user() : null,
        ]);
    }
}

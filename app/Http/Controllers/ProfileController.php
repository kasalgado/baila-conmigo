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
        $profile = auth()->user();

        return Inertia::render('Profile/ProfileIndex', [
            'profile' => $profile,
            'address' => $profile->address,
            'fromUser' => null,
        ]);
    }

    public function show(int $id): Response
    {
        $profile = User::find($id);

        return Inertia::render('Profile/ProfileIndex', [
            'profile' => $profile,
            'address' => $profile->address,
            'fromUser' => Auth::user() !== $profile ? Auth::user() : null,
        ]);
    }
}

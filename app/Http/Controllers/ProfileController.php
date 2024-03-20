<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function index(): Response
    {
        $user = User::find(3);

        return Inertia::render('Profile/ProfileIndex', [
            'user' => $user,
            'address' => $user->address,
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(): Response
    {
        return Inertia::render('User/UserIndex', [
            'users' => User::all(),
        ]);
    }

    public function show(User $user)
    {
        return Inertia::render('User/UserShow', [
            'profile' => $user,
            'address' => $user->address,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        return Inertia::render('User/UserEdit', [
            'profile' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $user->update(
            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'birthday' => 'required',
            ])
        );

        return redirect()->route('user.index')->with('success', 'User was edited.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User was deleted.');
    }
}

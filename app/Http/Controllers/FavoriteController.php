<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class FavoriteController extends Controller
{
    public function index(Request $request): Response
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
        ];
        $favorites = Auth::user()
            ->favorites()
            ->filter($filters)
            ->get();

        foreach ($favorites as &$favorite) {
            $favorite->fav_user_id = User::find($favorite->fav_user_id);
        }

        return Inertia::render('Favorite/FavoriteIndex', [
            'favorites' => $favorites,
        ]);
    }

    public function create(int $id): RedirectResponse
    {
        Favorite::factory()->create([
            'user_id' => Auth::user(),
            'fav_user_id' => User::find($id),
        ]);

        return redirect()->route('search.index')->with('success', 'Usuario añadido favoritos');
    }

    public function store()
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Favorite $favorite): RedirectResponse
    {
        $this->authorize('delete', $favorite);
        $favorite->deleteOrFail();

        return redirect()->back()->with('success', 'Favorito borrado');
    }
}

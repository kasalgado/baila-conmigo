<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class SearchController extends Controller
{
    public function index(Request $request): Response
    {
        $filters = $request->only(['username', 'minimum', 'maximum']);
        $profiles = User::createdAt()
            ->isNotAdmin()
            ->filter($filters)
            ->paginate(3)
            ->withQueryString();
        $userFavorites = Auth::user()->favorites;

        foreach ($profiles as $profile) {
            foreach ($userFavorites as $favorite) {
                if ($profile->id === $favorite->fav_user_id) {
                    $profile->favorite = true;
                    continue 2;
                }
            }
        }
        
        return Inertia::render('Search/SearchIndex', [
            'filters' => $filters,
            'profiles' => $profiles,
        ]);
    }
}

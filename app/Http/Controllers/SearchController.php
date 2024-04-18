<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SearchController extends Controller
{
    public function index(Request $request): Response
    {
        $filters = $request->only(['username', 'minimum', 'maximum']);
        
        return Inertia::render('Search/SearchIndex', [
            'filters' => $filters,
            'profiles' => User::createdAt()
                ->filter($filters)
                ->paginate(3)
                ->withQueryString(),
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SearchController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Search/SearchIndex');
    }

    public function list(Request $request): Response
    {
        return Inertia::render('Search/SearchList', [
            'name' => $request->input('name'),
            'minimum' => $request->input('minimum'),
            'maximum' => $request->input('maximum'),
        ]);
    }
}

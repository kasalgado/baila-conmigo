<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AddressController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Address/AddressCreate', [
            'user' => auth()->user(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $address = Address::create($request->validate([
            'street' => 'required|string|max:64',
            'sector' => 'required|string|max:32',
            'user_id' => 'required|numeric',
        ]));

        return redirect()->route('home')->with('success', 'Cuenta creada.');
    }
}

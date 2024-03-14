<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Contact/ContactIndex', [
            'contacts' => Contact::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Contact/ContactCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Contact::create(
            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'message' => 'required|min:10',
            ])
        );

        return redirect()->route('contact.index')->with('success', 'Contact message created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact): Response
    {
        return Inertia::render('Contact/ContactShow', [
            'contact' => $contact,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('contact.index');
    }
}

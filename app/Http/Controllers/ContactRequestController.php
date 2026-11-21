<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string',
            'artwork_id' => 'nullable|exists:artworks,id',
        ]);

        $validated['status'] = 'nouveau';

        ContactRequest::create($validated);

        return redirect()->back()->with('success', 'Votre demande a bien été envoyée. Nous vous recontacterons très rapidement.');
    }
}

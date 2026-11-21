<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function index()
    {
        $requests = ContactRequest::with('artwork')->latest()->get();
        return view('admin.contacts.index', compact('requests'));
    }

    public function show(ContactRequest $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function update(Request $request, ContactRequest $contact)
    {
        $contact->update(['status' => $request->status]);
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Le statut de la demande a été mis à jour.');
    }

    public function destroy(ContactRequest $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')
            ->with('success', 'La demande a bien été supprimée.');
    }
}

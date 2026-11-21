<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:newsletter_subscribers,email',
        ], [
            'email.unique' => 'Cet email est déjà inscrit à la newsletter.',
        ]);

        NewsletterSubscriber::create($validated);

        return redirect()->back()->with('newsletter_success', 'Merci ! Votre inscription à la newsletter a bien été prise en compte.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Mail naar admin
        Mail::raw("
            Naam: {$validated['name']}
            E-mail: {$validated['email']}
            Onderwerp: {$validated['subject']}

            Bericht:
            {$validated['message']}
        ", function ($mail) use ($validated) {
            $mail->to('admin@jouwdomein.com') // <- zet hier je admin e-mailadres
                 ->from($validated['email'], $validated['name'])
                 ->subject("Contactformulier: {$validated['subject']}");
        });

        return back()->with('success', 'Bedankt voor je bericht! We nemen zo snel mogelijk contact op.');
    }
}

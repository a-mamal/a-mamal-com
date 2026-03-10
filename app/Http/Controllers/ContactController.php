<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ContactController extends Controller
{
    public function index() {   
        // Load all profiles with links
        $user = User::with('profiles.links')->first();

        // Pick only the first profile  
        $profile = $user?->profiles->first(); 

        // Pass data to the view
        return view('pages.contact', [
            'user' => $user,
            'profile' => $profile
        ]);
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Mail::raw($validated['message'], function ($message) use ($validated) {
            $message->to(env('MAIL_TO_ADDRESS'))
                    ->subject("Message from: {$validated['name']}")
                    ->replyTo($validated['email']);
        });

        return back()->with('success', 'Message sent!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function index()
    {   
        // Retrieve the first user and eagerly load related data needed for the About page
        $user = User::with(
            'profiles.links' , 
            'profiles.degrees.organization',
            'profiles.spokenLanguages'
            )->first();

        // Select the first profile associated with the user
        $profile = $user?->profiles->first();

        // Format degree dates for display on the About page
        $degrees = ($profile?->degrees ?? collect())->map(function($degree) {
            $degree->formatted_start = $degree->start_date 
                ? Carbon::parse($degree->start_date)->format('M Y') 
                : '?';
            $degree->formatted_end = $degree->end_date 
                ? Carbon::parse($degree->end_date)->format('M Y') 
                : 'Present';
            return $degree;
        });

        // Format certificate award dates for display
        $certificates = ($profile?->certificates ?? collect())->map(function($cert) {
            $cert->formatted_date = $cert->date_awarded 
                ? Carbon::parse($cert->date_awarded)->format('M Y') 
                : '?';
            return $cert;
        });

        // Retrieve spoken languages for the profile
        $languages = $profile?->spokenLanguages ?? collect();

        // Pass all prepared data to the About page view
        return view('pages.about', [
            'user' => $user,
            'profile' => $profile,
            'degrees' => $degrees,
            'certificates' => $certificates,
            'languages' => $languages
        ]);
    }
}

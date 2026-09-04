<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('status', 'published')
            ->latest('created_at')
            ->take(3)
            ->get();

        return view('pages.home', compact('featuredProjects'));
    }
}
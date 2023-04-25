<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Route;

class HomeController extends Controller
{
    public function index(Request $request) {
        return Inertia::render('Home');
    }

    public function packages(Request $request) {
        return Inertia::render('Packages', [
            'packages' => Package::with('itinerary')->get()
        ]);
    }
}

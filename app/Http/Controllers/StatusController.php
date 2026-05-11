<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class StatusController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome');
    }
}

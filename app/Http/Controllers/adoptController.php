<?php

namespace App\Http\Controllers;

use App\Models\Pet;

class adoptController extends Controller
{
    public function index()
    {
        $pets = Pet::with('images')->latest()->get();
        return view('adopt.index', compact('pets'));
    }

    public function show($id)
    {
        $pet = Pet::with('images')->findOrFail($id);
        return view('adopt.show', compact('pet'));
    }
}

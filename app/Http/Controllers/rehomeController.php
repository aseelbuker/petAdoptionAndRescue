<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\PetsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class rehomeController extends Controller
{
    public function create()
    {
        return view('rehome.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'type'        => 'required',
            'age'         => 'required|integer',
            'gender'      => 'required',
            'size'        => 'required',
            'breed'       => 'nullable|string',
            'description' => 'nullable|string',
            'pet_photos.*'=> 'image|mimes:jpg,jpeg,png|max:2048',
        ]);
  dd($request->file('pet_photos'));
        $pet = Pet::create([
            ...$validated,
            'status' => 'available',
        ]);
if ($request->hasFile('pet_photos')) {
    foreach ($request->file('pet_photos') as $image) {
        $path = $image->store('petsImage', 'public');

        $pet->images()->create([
            'path' => $path,
        ]);
    }
}


        return redirect()->route('adopt.index');
    }
}

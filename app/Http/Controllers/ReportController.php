<?php

namespace App\Http\Controllers;

use App\Models\PetsImage;
use App\Models\Report;
use App\Models\reportImage;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Show the form
     */
    public function create()
    {
        return view('Home.report');
    }

    /**
     * Store the report
     */
    public function store(Request $request)
{
    // Validate input
    $validated = $request->validate([
        'status' => 'required',
        'pet_type' => 'required',
        'breed' => 'nullable|string',
        'size' => 'required',
        'age' => 'required',
        'color_markings' => 'nullable|string',
        'location' => 'required',
        'date_time' => 'required|date',
        'name' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email',
        'additional_info' => 'nullable|string',
        'urgent' => 'boolean',
        'allow_contact' => 'boolean',
        'reportImage.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Create the report
    $report = Report::create($validated);

    // Handle uploaded images
    if ($request->hasFile('reportImage')) {
        foreach ($request->file('reportImage') as $image) {
            $path = $image->store('reportImage', 'public');

            PetsImage::create([
                'report_id' => $report->id,
                'path' => $path,
            ]);
        }
    }

    // Redirect with success
    return redirect()
        ->route('volunteer.index')
        ->with('success', 'Report submitted successfully!');
}

    /**
     * Show the submitted report
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('Home.reportdetails', compact('report'));
    }
}

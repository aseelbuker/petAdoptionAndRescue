<?php

namespace App\Http\Controllers;

use App\Models\Report;

class volunteerController extends Controller
{
   public function index()
{
    $reports = Report::with('reportImage')->latest()->get();
    return view('Home.volunteer', compact('reports'));
}

}

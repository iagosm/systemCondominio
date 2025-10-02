<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Resident;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Incidents/Index',[
            'incidents' => Incident::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Incidents/Create',[
            'residents' => Resident::with('user:id,name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incidents = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'resident_id' => 'required',
            'status' => 'required',
        ]);
        Incident::create($incidents);
        return to_route('incidents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

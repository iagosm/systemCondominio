<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Resident;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Incidents/Index',[
            'incidents' => Incident::with('tags')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Incidents/Create',[
            'tags' => Tag::all()
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
            'status' => 'required',
            'tags' => 'required',
        ]);
        $incidents['resident_id'] = Auth::id();
        $incident = Incident::create($incidents);
        $incident->tags()->attach($incidents['tags']);
        return to_route('incidents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia::render('Incidents/Show', [
            'incident' => Incident::with('tags')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('Incidents/Edit', [
            'incident' => Incident::with('tags')->findOrFail($id),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'tags' => 'required',
        ]);
        $incident = Incident::find($id);
        $incident->title = $request['title'];
        $incident->description = $request['description'];
        $incident->status = $request['status'];
        $incident->tags()->sync([$request['tags']]);
        $incident->save();
        return to_route('incidents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Incident::destroy($id);
        return to_route('incidents.index');
    }
}

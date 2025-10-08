<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Suggestions/Index', [
            'suggestions' => Suggestion::with('tags')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return Inertia::render('Suggestions/Create',[
            'tags' => Tag::all()
         ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $suggestionValid = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $suggestionValid['resident_id'] = Auth::id();
        $suggestion = Suggestion::create($suggestionValid);
        $suggestion->tags()->attach($request['tags']);
        return to_route('suggestions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return Inertia::render('Suggestions/Show', [
            'suggestion' => Suggestion::with('tags')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia::render('Suggestions/Edit', [
            'suggestion' => Suggestion::with('tags')->findOrFail($id),
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
        $suggestion = Suggestion::find($id);
        $suggestion->title = $request['title'];
        $suggestion->description = $request['description'];
        $suggestion->status = $request['status'];
        $suggestion->tags()->sync([$request['tags']]);
        $suggestion->save();
        return to_route('suggestions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Suggestion::destroy($id);
        return to_route('suggestions.index');
    }
}

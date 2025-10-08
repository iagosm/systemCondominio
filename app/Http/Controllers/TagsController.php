<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return Inertia::render('Tags/Index', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Tags/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tag = $request->validate([
            'name' => 'required'
        ]);
        Tag::create($tag);
        return to_route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia::render('Tags/Show', [
            'tag' => Tag::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         return Inertia::render('Tags/Edit', [
            'tag' => Tag::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $suggestion = Tag::find($id);
        $suggestion->name = $request['name'];
        $suggestion->save();
        return to_route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tag::destroy($id);
        return to_route('tags.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of tags.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new tag.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created tag in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags,name|max:255',
        ]);

        Tag::create($request->only('name'));

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    /**
     * Display the specified tag.
     */
    public function show(Tag $tag)
    {
        // Optionally, show all posts associated with this tag
        $posts = $tag->posts()->paginate(10);
        return view('tags.show', compact('tag', 'posts'));
    }

    /**
     * Show the form for editing the specified tag.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified tag in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id . '|max:255',
        ]);

        $tag->update($request->only('name'));

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified tag from storage.
     */
    public function destroy(Tag $tag)
    {
        // Optional: Check if the tag has associated posts
        if ($tag->posts()->count()) {
            return redirect()->route('tags.index')->with('error', 'Cannot delete tag with associated posts.');
        }

        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}

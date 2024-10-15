<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


class PostController extends Controller
{
    public function home()
    {
        // Fetch all posts with their associated category and tags, paginated
        $posts = Post::with(['category', 'tags'])->orderBy('created_at', 'desc')->paginate(10);
        return view('home', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
    $tags = Tag::all();
    return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'image_url' => [
            'nullable',
            'url',
            'active_url',
            'regex:/\.(jpeg|jpg|png|gif|svg)(\?.*)?$/i',
        ], // New validation rule
        ]);

        // Extract relevant data
        $data = $request->only('title', 'content', 'category_id', 'image_url');

        // Create the post
        $post = Post::create($data);

        // Attach tags if provided
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('category', 'tags');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post->load('tags');
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'image_url' => [
            'nullable',
            'url',
            'active_url',
            'regex:/\.(jpeg|jpg|png|gif|svg)(\?.*)?$/i',
        ], // New validation rule
        ]);
    
        // Extract relevant data
        $data = $request->only('title', 'content', 'category_id', 'image_url');
    
        // Update the post
        $post->update($data);
    
        // Sync tags if provided
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
{
    // No need to delete image files since images are hosted externally
    $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
}
}

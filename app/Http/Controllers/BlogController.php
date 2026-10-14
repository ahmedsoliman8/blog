<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('theme.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newImageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('blogs', $newImageName, 'public');
            $data['image'] = $newImageName;
        }
        $data['user_id'] = $request->user()->id;
        Blog::create($data);
        return redirect()->back()
            ->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->load(['category', 'user']);
        return view('theme.single-blog', compact('blog'));
    }

    public function myBlogs()
    {

        $blogs = Auth::user()->blogs()->paginate(10);

        return view('theme.blogs.my-blogs', compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();

        return view('theme.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete the previous image, if it exists.
            if ($blog->image) {
                Storage::disk('public')->delete('blogs/' . $blog->image);
            }
            $image = $request->file('image');
            $newImageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('blogs', $newImageName, 'public');
            $validated['image'] = $newImageName;
        }
        $blog->update($validated);
        return redirect()
            ->route('blogs.my-blogs')
            ->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {  // Delete the previous image, if it exists.
        if ($blog->image) {
            Storage::disk('public')->delete('blogs/' . $blog->image);
        }
        $blog->delete();

        return redirect()
            ->route('blogs.my-blogs')
            ->with('success', 'Blog deleted successfully.');
    }
}

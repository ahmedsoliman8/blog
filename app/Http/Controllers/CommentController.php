<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(
        StoreCommentRequest $request,
        Blog $blog
    ) {
        $blog->comments()->create($request->validated());

        return back()->with(
            'success',
            'Comment added successfully.'
        );
    }
}

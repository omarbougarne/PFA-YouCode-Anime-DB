<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'content' => 'required|max:255',
            'anime_id' => 'required|exists:animes,id',
        ]);

        // Store comment
        Comment::create([
            // 'user_id' => auth()->id(), // Assuming user is authenticated
            'anime_id' => $request->anime_id,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Comment posted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anime = Anime::all();
        return view('anime.home', compact('anime'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anime.create');
    }

    public function show(Request $request, Anime $anime)
    {
        // If the request is POST, handle comment submission
        if ($request->isMethod('post')) {
            // Validate the comment submission
            $request->validate([
                'content' => 'required|max:255',
            ]);

            // Create a new comment
            $comment = new Comment();
            $comment->content = $request->content;
            $comment->anime_id = $anime->id;
            // Assuming the user is authenticated
            $comment->user_id = auth()->id();
            $comment->save();

            // Redirect back to the anime show page
            return redirect()->route('anime.show', $anime)->with('success', 'Comment posted successfully!');
        }

        // If it's not a POST request, simply display the anime details
        return view('anime.show', compact('anime'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // dd($request->image_url);

    $request->validate([
        'title' => 'required|string',
        'synopsis' => 'nullable|string',
        'episodes' => 'nullable|integer',
        'status' => 'nullable|in:ongoing,completed,on_hold,dropped',
        'rating' => 'nullable|string',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
if ($request->hasFile('image_url')) {
    $imagePath = $request->file('image_url')->store('images', 'public');
}
    // $user = auth()->user();
    $anime = new Anime([
        'title' => $request->title,
        'synopsis' => $request->synopsis,
        'episodes' => $request->episodes,
        'status' => $request->status,
        'rating' => $request->rating,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'image_url' => $imagePath,
    ]);
    $anime->save();

    return redirect()->route('anime.index')
        ->with('success', 'Anime created successfully.');
}



    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anime $anime)
    {
        return view('anime.edit', compact('anime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anime $anime)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $anime->update($request->all());

        return redirect()->route('anime.index')
            ->with('success', 'Anime updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime $anime)
    {
        $anime->delete();

        return redirect()->route('anime.index')
            ->with('success', 'Anime deleted successfully');
    }

}

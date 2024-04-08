<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeListController extends Controller
{
    public function addToFavorites(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'anime_id' => 'required|exists:anime,id',
        ]);

        // Add the anime to the user's favorites
        Anime::find($request->anime_id)->users()->attach(null);

        return redirect()->back()->with('success', 'Anime added to favorites successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Game;

class ReviewController extends Controller
{
    public function store(Request $request, Game $game)
    {
        if ($request->user()->loginDays() < 3) {
            return back()->withErrors(['review' => 'You can write a review after logging in on at least 3 different days.']);
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string|min:3|max:1500',
        ]);

        $validated['game_id'] = $game->id;

        $request->user()->reviews()->create($validated);

        return redirect()->route('games.show', ['game' => $game])
            ->with('success', 'Review placed successfully! it will be visible after approval by an admin.');
    }

    public function edit(Request $request, Review $review)
    {
        Gate::authorize('update', $review);

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        Gate::authorize('update', $review);

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string|min:3|max:1500',
        ]);

        $review->update($validated);

        return redirect()->route('games.show', ['game' => $review->game])
            ->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        Gate::authorize('delete', $review);

        $game = $review->game;
        $review->delete();
        return redirect()->route('games.show', ['game' => $game])
            ->with('success', 'Review deleted successfully!');
    }

    public function toggle(Review $review)
    {
        $review->is_visible = ! $review->is_visible;
        $review->save();

        return redirect()->route('admin')
            ->with('success', $review->is_visible ? 'Review accepted, all users can see this review now!' : 'Review is hidden now, nobody is able to see it.');
    }
}

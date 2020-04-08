<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tournament;

class TournamentApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::where('creator', Auth::id())
            ->with(['city', 'tsetting'])
            ->get();

        return response()
            ->json($tournaments);
    }

    public function trashed()
    {
        $tournaments = Tournament::onlyTrashed('creator', Auth::id())->with('city')->get();
        return response()
            ->json($tournaments);
    }

    public function recents()
    {
        $tournaments = Tournament::with(['city', 'tsetting'])
            ->orderBy('starting_date', 'desc')
            ->limit(10)
            ->get();

        return response()
            ->json($tournaments);
    }

    public function search($term)
    {
        $tournaments = Tournament::search($term)
            ->paginate(10);

        $tournaments = $tournaments
        ->load('city')
        ->load('tsetting');

        return $tournaments;
    }
}

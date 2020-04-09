<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tournament;
use App\Tsetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TournamentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tournaments');
    }

    public function dashboard()
    {
        $tournaments = Tournament::with(['city', 'tsetting'])
            ->where('creator', Auth::id())
            ->orderBy('starting_date', 'DESC')
            ->paginate(5);

        return view('tournaments.dashboard', [
            'tournaments' => $tournaments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:255',
            'city_id' => 'required|exists:cities,id',
            'starting_date' => 'required|date',
            'starting_time' => 'required|date_format:H:i',
            'address' => 'required|max:255',
        ]);

        $tournament = new Tournament();
        $tournament->name = $request->input('name');
        $tournament->starting_date = $request->input('starting_date');
        $tournament->starting_time = $request->input('starting_time');
        $tournament->address = $request->input('address');
        $tournament->city_id = $request->input('city_id');
        $tournament->creator = Auth::id();

        $tournament->save();

        // Initialize tsettings
        $tournament->tsetting()->create();

        $request->session()->flash('toast', $tournament->name . ' ajouté');
        return redirect()->route('tournaments.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tournament = Tournament::find($id);

        return view('tournaments.edit', ['tournament' => $tournament]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $id)
    {
        $tournament = $this->saveTournament($request, $id);
        $request->session()->flash('toast', $tournament->name . ' mis à jour');
        return redirect()->route('tournaments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function restore(Request $request, $id)
    {
        $tournament = Tournament::withTrashed()->where('id', $id)->first();
        $tournament->restore();
        $request->session()->flash('toast', $tournament->name . ' : restauré');
        return redirect()->back();
    }

    public function trashed()
    {
        return view('tournaments', [
            'trash' => true
        ]);
    }
    public function trash(Request $request, Tournament $tournament)
    {
        $tournament->delete();
        $request->session()->flash('toast', $tournament->name . ' : supprimé');

        return redirect()->back();
    }

    public function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required|min:3|max:255',
            'city_id' => 'required|exists:cities,id',
            'starting_date' => 'required|date',
            'starting_time' => 'required|date_format:H:i',
            'address' => 'required|max:255',
            'size' => 'required|numeric|min:2',
            'genre' => 'required|in:mixed,female,male',
            'team_size' => 'required|in:2,3,4,6',
            'field' => 'required|in:indoor,beach,grass,snow',
        ]);
    }

    public function saveTournament(Request $request, Tournament $tournament = null)
    {

        $this->validateRequest($request);

        $tournament = $tournament ?? new Tournament();


        $tournament->size = $request->input('size');
        $tournament->genre = $request->input('genre');
        $tournament->team_size = $request->input('team_size');
        $tournament->field = $request->input('field');

        $tournament->save();

        return $tournament;
    }
}

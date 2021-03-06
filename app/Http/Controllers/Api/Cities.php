<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\City;

class Cities extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        // $tournaments = $user->tournaments;

        // return response()
        //     ->json($tournaments);
    }

    public function search($term)
    {
        $cities = City::search($term)->get();

        return $cities->toJson();
    }

}

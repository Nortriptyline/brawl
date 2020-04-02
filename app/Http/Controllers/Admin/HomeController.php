<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Department;
use App\City;
use App\Region;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $departments = Department::where('code', 91)->first();
        $region = Region::where('code', 11)->first();

        return view('home', [
            'region' => $region,
        ]);
    }
}

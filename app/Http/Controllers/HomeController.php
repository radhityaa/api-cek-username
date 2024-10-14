<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $title = 'Dashboard';

        $games = $games = Game::withCount(['histories' => function ($q) {
            $q->where('user_id', Auth::user()->id);
        }])
            ->latest()
            ->get();

        return view('home', compact('title', 'games'));
    }
}

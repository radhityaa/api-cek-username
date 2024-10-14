<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;

class GameController extends Controller
{
    public function index()
    {
        $title = 'Daftar Game';

        $games = Game::latest()->get();
        return view('games.index', compact('title', 'games'));
    }

    public function create()
    {
        $title = 'Tambah Game';

        return view('games.create', compact('title'));
    }

    public function store(GameRequest $request)
    {
        $imageName = time() . '.' . $request['picture']->extension();
        $request['picture']->move(public_path('assets/img/games'), $imageName);

        Game::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'picture' => $imageName,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('games.index')->with('success', 'Game Berhasil Ditambahkan');
    }
}

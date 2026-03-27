<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Rent;
use App\Models\Users;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $rent = Rent::with(['User', 'Movies'])->get();
        $users = Users::all();
        $movies = Movies::all();

        $data = [
            'rent' => $rent,
            'movies' => $movies,
            'users' => $users
        ];

        return view('contents.Rents.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required',
            'user_id' => 'required'
        ]);

        $data = Rent::create([$request]);

        return response()->json([
            'message' => 'Rental Movie has been added',
            'data' => $data
        ]);
    }
}

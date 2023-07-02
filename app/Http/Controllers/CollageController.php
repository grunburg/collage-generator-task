<?php

namespace App\Http\Controllers;

use App\Http\Resources\PosterResource;
use App\Modules\Poster\Models\Poster;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CollageController extends Controller
{
    public function index(): Response
    {
        $posters = PosterResource::collection(Poster::all());

        $collages = [];

        return Inertia::render('Index', [
            'posters' => $posters,
            'collages' => $collages,
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
    }
}

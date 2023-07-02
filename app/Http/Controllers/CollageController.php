<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollageRequest;
use App\Http\Resources\CollageResource;
use App\Http\Resources\PosterResource;
use App\Modules\Collage\Models\Collage;
use App\Modules\Collage\Services\CollageGeneratorService;
use App\Modules\Poster\Models\Poster;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class CollageController extends Controller
{
    public function index(): Response
    {
        $posters = PosterResource::collection(Poster::all());
        $collages = CollageResource::collection(Collage::all());

        return Inertia::render('Index', [
            'posters' => $posters,
            'collages' => $collages,
        ]);
    }

    public function store(StoreCollageRequest $request)
    {
        $posters = Poster::findMany($request->get('posters'));

        $posters = $posters->sort(function ($a, $b) {
            return strcoll($a->name, $b->name);
        });

        $images = $posters->map(function (Poster $poster) {
            return "assets/images/posters/{$poster->path}";
        });

        $name = uniqid() . '.png';

        $collage = app(CollageGeneratorService::class)->create($images->toArray(), [362, 544]);
        Storage::drive('public')->put("collages/{$name}", $collage);

        Collage::create(['path' => $name]);

        Redirect::route('collage.index');
    }
}

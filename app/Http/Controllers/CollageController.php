<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollageRequest;
use App\Http\Resources\PosterResource;
use App\Modules\Collage\Exceptions\CollageException;
use App\Modules\Collage\Repositories\CollageRepository;
use App\Modules\Collage\Services\CollageService;
use App\Modules\Poster\Repositories\PosterRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class CollageController extends Controller
{
    public function index(): Response
    {
        $posters = app(PosterRepository::class)->getAll();
        $posters = PosterResource::collection($posters);

        $collages = app(CollageRepository::class)->getAll();
        $collages = PosterResource::collection($collages);

        return Inertia::render('Index', [
            'posters' => $posters,
            'collages' => $collages,
        ]);
    }

    public function store(StoreCollageRequest $request): RedirectResponse
    {
        try {
            app(CollageService::class)->generate($request->validated());
        } catch (CollageException $e) {
            return Redirect::route('collage.index')->with(['message' => $e->getMessage()]);
        }

        return Redirect::route('collage.index');
    }
}

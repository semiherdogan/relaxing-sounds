<?php

namespace App\Http\Controllers;

use Cache;
use App\Sound;
use App\Webservice\Response;

class SoundsController extends Controller
{
    public function index($categoryId)
    {
        // Get result and cache for given time in .env
        $sounds = Cache::remember('sounds', config('relaxing_sounds.cache_duration'), function() use ($categoryId) {
            return Sound::select('id', 'category_id', 'name', 'file')
                ->where('category_id', $categoryId)
                ->get();
        });

        return Response::success($sounds);
    }
}

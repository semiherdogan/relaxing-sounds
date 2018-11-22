<?php

namespace App\Http\Controllers;

use Cache;
use App\Sound;
use App\Webservice\Response;

class SoundsController extends Controller
{
    public function index($categoryId)
    {
        $sounds = Cache::remember('sounds', 30, function() use ($categoryId) {
            return Sound::select('id', 'category_id', 'name', 'file')
                ->where('category_id', $categoryId)
                ->get();
        });

        return Response::success($sounds);
    }
}

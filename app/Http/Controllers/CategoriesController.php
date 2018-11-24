<?php

namespace App\Http\Controllers;

use Cache;
use App\Category;
use App\Webservice\Response;

class CategoriesController extends Controller
{
    public function index()
    {
        // Get result and cache for given time in .env
        $categories = Cache::remember('categories', config('relaxing_sounds.cache_duration'), function() {
            return Category::select('id', 'name', 'order', 'image')
                ->orderBy('order')
                ->get();
        });

        return Response::success($categories);
    }
}

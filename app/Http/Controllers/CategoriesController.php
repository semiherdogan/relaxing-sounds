<?php

namespace App\Http\Controllers;

use Cache;
use App\Category;
use App\Webservice\Response;

class CategoriesController extends Controller
{
    public function index()
    {
        // Cache results for 30 minutes
        $categories = Cache::remember('categories', 30, function() {
            return Category::select('id', 'name', 'order', 'image')
                ->orderBy('order')
                ->get();
        });

        return Response::success($categories);
    }
}

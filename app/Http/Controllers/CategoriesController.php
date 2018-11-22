<?php

namespace App\Http\Controllers;

use App\Category;
use App\Webservice\Response;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'order', 'image')
            ->orderBy('order')
            ->get();

        return Response::success($categories);
    }
}

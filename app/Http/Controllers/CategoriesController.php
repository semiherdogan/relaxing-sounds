<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Webservice\Response;
use App\Webservice\WSHelper;
use Illuminate\Http\Request;
use Validator;

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

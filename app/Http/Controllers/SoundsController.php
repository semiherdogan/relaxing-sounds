<?php

namespace App\Http\Controllers;

use App\Sound;
use App\Webservice\Response;

class SoundsController extends Controller
{
    public function index($categoryId)
    {
        $sounds = Sound::select('id', 'category_id', 'name', 'file')
            ->where('category_id', $categoryId)
            ->get();

        return Response::success($sounds);
    }
}

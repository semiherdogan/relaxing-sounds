<?php

namespace App\Http\Controllers;

use App\Sound;
use App\Webservice\ErrorCodes;
use App\Webservice\Response;
use App\Webservice\WSHelper;

class FavoritesController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse3
     *
     * Returns user's favored sounds
     */
    public function index()
    {
        $userFavorites = WSHelper::getUser()->favorites;
        $soundIds = $userFavorites->pluck('sound_id');

        $sounds = Sound::select('id', 'category_id', 'name', 'file')
            ->whereIn('id', $soundIds)
            ->get();

        return Response::success($sounds);
    }

    /**
     * @param $soundId
     * @return \Illuminate\Http\JsonResponse
     *
     * Adds favored sound
     */
    public function store($soundId)
    {
        // Check if sound exists
        $sound = Sound::find($soundId);
        if (!$sound) {
            return Response::fail(
                ErrorCodes::SOUND_NOT_FOUND,
                ErrorCodes::SOUND_NOT_FOUND_MESSAGE
            );
        }

        $user = WSHelper::getUser();

        $soundAlreadyFavored = $user->favorites->contains('sound_id', $soundId);

        if (!$soundAlreadyFavored) {
            // Add sound to user's favorites
            WSHelper::getUser()->favored($soundId);
        }

        return Response::success();
    }

    /**
     * @param $soundId
     * @return \Illuminate\Http\JsonResponse
     *
     * Removes favored sound
     */
    public function delete($soundId)
    {
        // Check if sound exists
        $sound = Sound::find($soundId);
        if (!$sound) {
            return Response::fail(
                ErrorCodes::SOUND_NOT_FOUND,
                ErrorCodes::SOUND_NOT_FOUND_MESSAGE
            );
        }

        // Delete sound from favorites
        WSHelper::getUser()->unFavored($soundId);

        return Response::success();
    }
}
<?php

namespace App\Services\Api;

use App\Http\Requests\FavoriteRequest;


class FavoriteService
{

    public function store(FavoriteRequest $request): array
    {
        $user = auth()->user();
        $favorite = $user->favorites()->firstOrCreate([
            'unit_id' => $request->input('unit_id'),
        ]);
        if ($favorite->wasRecentlyCreated) {
            return [
                'success' => true,
                'status' => 201,
                'message' => 'Successfully added to favorite unit',
            ];
        }
        return [
            'success' => true,
            'status' => 200,
            'message' => 'Unit is already in favorites',

        ];
    }

    public function destroy($id): array
    {
        $user = auth()->user();
        $favorite = $user->favorites()->where('unit_id', $id)->first();
        if ($favorite) {
            $favorite->delete();
            return [
                'success' => true,
                'message' => 'Successfully removed from favorite units',
            ];
        }

        return [
            'success' => false,
            'message' => 'Favorite unit not found',
        ];
    }

    public function getAllFavorites(): array
    {
        $user = auth()->user();
        $favorites = $user->favorites()->with('unit')->Paginate(10)->pluck('unit');
        if (!$favorites->isEmpty()) {
            return [
                'success' => true,
                'data' => $favorites,
            ];
        }
        return [
            'success' => false,
            'message' => 'Favorites not found',
        ];
    }
}

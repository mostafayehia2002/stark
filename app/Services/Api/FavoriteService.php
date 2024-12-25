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
                'message' => translate_message('success_added'),
            ];
        }
        return [
            'success' => true,
            'status' => 200,
            'message' => translate_message('unit_already_favorites'),

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
                'message' => translate_message('success_removed'),
            ];
        }

        return [
            'success' => false,
            'message' => translate_message('item_not_found'),
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
            'message' => translate_message('no_data_found'),
        ];
    }
}

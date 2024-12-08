<?php

namespace App\Services\Api;

use App\Enums\UnitStatus;
use App\Enums\UnitType;
use App\Models\Unit;
use Illuminate\Http\Request;


class UnitApiService
{
    public function getUnitType()
    {

        return UnitType::cases();

    }


    public function getAllUnits(Request $request)
    {
        $units = Unit::query()->where('is_booked',false)->where('status',UnitStatus::ACCEPTED);
        //filter by type
        if($request->has('type')){
            $units = $units->where('type', $request->get('type'));
        }
        //filter by price
        if ($request->has('min_price') && $request->has('max_price')) {
            $units->whereBetween('price', [$request->get('min_price'), $request->get('max_price')]);
        } elseif ($request->has('min_price')) {
            $units->where('price', '>=', $request->get('min_price'));
        } elseif ($request->has('max_price')) {
            $units->where('price', '<=', $request->get('max_price'));
        }
         //filter by area
        if ($request->has('min_area') && $request->has('max_area')) {
            $units->whereBetween('area', [$request->get('min_area'), $request->get('max_area')]);
        } elseif ($request->has('min_area')) {
            $units->where('area', '>=', $request->get('min_area'));
        } elseif ($request->has('max_area')) {
            $units->where('area', '<=', $request->get('max_area'));
        }
        //filter by number of bedrooms
        if ($request->has('number_bedroom')) {

            $units = $units->where('number_bedroom', $request->get('number_bedroom'));
        }
        //filter by address
        if ($request->has('address')) {
            $units = $units->where('address', 'like', '%' . $request->get('address') . '%');
        }
        //filter by features
        if ($request->has('features')) {
            $units = $units->whereHas('features', function($query) use ($request) {
                $query->whereIn('features.id', $request->get('features'));
            });
        }

        $units = $units->orderBy('created_at', 'DESC')->paginate(15);
       if(!$units->isEmpty()){
           return [
               'success' => true,
               'data' => $units,
           ];
       }
       return [
           'success' => false,
           'message' => 'No data found',
       ];
    }


    public function getUnitDetails($id)
    {
        $unit = Unit::query()->where('is_booked',false)->where('id', $id)->first();
        if($unit){
            return [
                'success' => true,
                'data' => $unit,
            ];
        }
        return [
            'success' => false,
            'message' => 'No data found',
        ];

    }

}

<?php

namespace App\Services\Admin;

use App\Enums\UnitStatus;
use App\Enums\UnitType;
use App\Enums\UserType;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Jobs\StoreUnitImages;
use App\Jobs\UpdateUnitImages;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UnitAdminService
{

    public function changeStatus($id, $status): array
    {
        try {
            $unit = Unit::findOrFail($id);
            $nextStatus = match ($status) {
                UnitStatus::PENDING->value => UnitStatus::ACCEPTED->value,
                UnitStatus::ACCEPTED->value => UnitStatus::REJECTED->value,
                UnitStatus::REJECTED->value => UnitStatus::ACCEPTED->value,
            };
            $unit->update(['status' => $nextStatus]);
            return [
                'success' => true,
                'message' => 'Status changed to ' . $nextStatus . ' Successfully!'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }


    }

    public function destroy($id): array
    {
        try {
            $unit = Unit::findOrFail($id);
            if ($unit->images) {
            //delete all images
                UpdateUnitImages::dispatch($unit);
            }
            $unit->delete();
            return [
                'success' => true,
                'message' => 'Unit deleted successfully',
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function store(StoreUnitRequest $request)
    {
        try {
            DB::beginTransaction();

            $unit = Unit::create([
                'user_id' => auth()->id(),
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'type' => $request->input('type'),
                'area' => $request->input('area'),
                'number_bedroom' => $request->input('number_bedroom'),
                'number_bathroom' => $request->input('number_bathroom'),
                'address' => $request->input('address'),
                'description' => $request->input('description'),
            ]);
            $unit->features()->attach($request->input('features'));
            if ($request->hasFile('image')) {
                $images = [];
                foreach ($request->file('image') as $image) {
                    $path = $image->store('uploads/unit_images', 'public');
                    $images[] = $path;
                }
                 StoreUnitImages::dispatch($unit, $images);
            }
            DB::commit();
            return [
                'success' => true,
                'message' => 'Unit added successfully'
            ];
        } catch (\Exception $exception) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(UpdateUnitRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $unit = Unit::findOrFail($id);
            // Update unit details
            $unit->update([
                'user_id' => auth()->id(),
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'type' => $request->input('type'),
                'area' => $request->input('area'),
                'number_bedroom' => $request->input('number_bedroom'),
                'number_bathroom' => $request->input('number_bathroom'),
                'address' => $request->input('address'),
                'description' => $request->input('description'),
            ]);
            if(auth()->user()->type===UserType::OWNER->value){

                $unit->update(['status' => UnitStatus::PENDING]);
            }

            // Update features
            $unit->features()->sync($request->input('features'));
            // Check if new images were uploaded
            if ($request->hasFile('image')) {

                UpdateUnitImages::dispatch($unit);

                // Upload new images and store their paths
                $images = [];
                foreach ($request->file('image') as $image) {
                    $path = $image->store('uploads/unit_images', 'public');
                    $images[] = $path;
                }

                // Attach the new images to the unit
                StoreUnitImages::dispatch($unit, $images);
            }

            // Commit the transaction
            DB::commit();
            return [
                'success' => true,
                'message' => 'Unit updated successfully',
            ];
        } catch (\Exception $exception) {
            // Rollback if any error occurs
            DB::rollBack();
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }

    }


}

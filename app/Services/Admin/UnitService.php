<?php
namespace App\Services\Admin;
use App\Enums\UnitStatus;
use App\Models\Unit;
class UnitService
{

    public function changeStatus($id, $status): array
    {
        try {
            $unit=Unit::findOrFail($id);
                $nextStatus = match ($status) {
                    UnitStatus::PENDING->value => UnitStatus::ACCEPTED->value,
                    UnitStatus::ACCEPTED->value => UnitStatus::REJECTED->value,
                    UnitStatus::REJECTED->value => UnitStatus::ACCEPTED->value,
                };
                $unit->update(['status' => $nextStatus]);
               return [
                   'success' => true,
                   'message'=>'Status changed to ' . $nextStatus . ' Successfully!'
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
        try{
          Unit::findOrFail($id)->delete();
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
}

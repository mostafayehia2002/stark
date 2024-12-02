<?php

namespace App\Services\Admin;

use App\Models\ContactUs;

class ContactUsService
{

    public function read($id)
    {
        try{
            ContactUs::findOrFail($id)->update(['is_read' => 1]);
            return [
                'success' => true,
                'message' => 'Successfully Read Message'
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete($id)
    {
        try {
            ContactUs::findOrFail($id)->delete();
                return [
                    'success' => true,
                    'message' => 'Successfully Delete Message'
                ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}

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
                'message' => translate_message('success_read_message')
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
                    'message' =>translate_message('success_deleted')
                ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}

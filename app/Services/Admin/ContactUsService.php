<?php

namespace App\Services\Admin;

use App\Models\ContactUs;

class ContactUsService
{

    public function read($id)
    {
        try {
          $contact= ContactUs::find($id)->update(['is_read'=>1]);
          if($contact){
              return [
                  'success'=>true,
                  'message'=>'Successfully Read Message'
              ];
          }
            return [
                'success'=>false,
                'message'=>'Failed Read Message'
            ];
        }catch (\Exception $exception){
            return[
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete($id){
        try {
            $contact= ContactUs::find($id);
            if($contact){
                $contact->delete();
                return [
                    'success'=>true,
                    'message'=>'Successfully Delete Message'
                ];
            }
            return [
                'success'=>false,
                'message'=>'Failed Delete Message'
            ];
        }catch (\Exception $exception){
            return[
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}

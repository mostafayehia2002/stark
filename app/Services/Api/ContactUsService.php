<?php

namespace App\Services\Api;

use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use App\Models\User;

class ContactUsService
{

    public static function sendContactUsMessage(ContactUsRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();
        if ($user){
            $data['is_user'] =true;
        }
        $contact = COntactUs::create($data);
        if($contact) {
        return [
            'success' => true,
            'message' => 'Message sent',
        ];
        }
        return [
            'success' => false,
            'message' => 'Something went wrong',
        ];

    }
}

<?php

namespace App\Models;

use App\Traits\CustomizeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    //
    use HasFactory,CustomizeDate;


    protected $table = 'contact_us';
    protected $fillable = [
        'full_name',
        'email',
        'message',
        'is_user',
        'is_read'
    ];
}

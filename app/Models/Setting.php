<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    //
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'key',
        'value',
        'type',
        'input_type',
        'is_editable',
    ];

    protected static function booted()
    {
        static::saved(function ($setting) {

            Cache::forget('settings');

        });
    }
}

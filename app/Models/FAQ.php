<?php

namespace App\Models;

use App\Traits\CustomizeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FAQ extends Model
{
    use HasFactory,CustomizeDate,HasTranslations;

    protected $table = 'faqs';
    protected $fillable = ['question','answer'];
    public $translatable = ['question','answer'];
}

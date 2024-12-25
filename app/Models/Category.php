<?php

namespace App\Models;

use App\Traits\CustomizeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    //
    use HasFactory,CustomizeDate, HasTranslations;


    protected $table = 'categories';
    protected $fillable = ['name'];
    public $translatable = ['name'];

    protected $casts=[
        'name'=>'array',
    ];
    public function features()
    {
        return $this->hasMany(Feature::class,'category_id');
    }


}

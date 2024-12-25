<?php

namespace App\Models;

use App\Traits\CustomizeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{

    use HasFactory ,CustomizeDate,HasTranslations;
    //
    protected $table = 'features';
    protected $fillable = ['category_id','name'];
    public $translatable = ['name'];

    protected $casts=[
        'name'=>'array',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function units()
    {
        return $this->belongsToMany(Unit::class, 'unit_features','feature_id','unit_id');
    }
}

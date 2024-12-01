<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{

    //
    protected $table = 'features';
    protected $fillable = ['category_id','name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function units()
    {
        return $this->belongsToMany(Unit::class, 'unit_features','feature_id','unit_id');
    }
}

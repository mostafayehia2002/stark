<?php

namespace App\Models;

use App\Traits\CustomizeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use HasFactory,CustomizeDate;


    protected $table = 'categories';
    protected $fillable = ['name'];

    public function features()
    {
        return $this->hasMany(Feature::class,'category_id');
    }


}

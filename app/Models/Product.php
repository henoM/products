<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'upc','case_count','name', 'description', 'brand','size','user_id','category_id','subcategory_id',
    ];

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
}

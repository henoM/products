<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'path','product_id',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }
}

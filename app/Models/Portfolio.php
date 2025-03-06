<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'image'
    ];

    // Define the relationship with Category model
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}

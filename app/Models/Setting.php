<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'company_address',
        'email',
        'phone',
        'location',
        'logo_image',
        'instagram_id',
        'facebook_id',
        'whatsapp_id',
    ];
}

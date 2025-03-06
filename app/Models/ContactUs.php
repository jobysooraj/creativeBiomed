<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    //
    protected $table = 'contact_us';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        
    ];
}

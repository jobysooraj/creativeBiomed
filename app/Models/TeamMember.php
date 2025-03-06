<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    //
    protected $table = 'team_members';  // Make sure the table name is correct
    protected $fillable = ['name', 'email', 'phone', 'bio', 'image', 'designation'];
}

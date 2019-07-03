<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $primaryKey = 'id';
    protected $table = 'roles';
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];
}

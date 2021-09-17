<?php

namespace Armcanada\Dialer\Domain\Calls\Models;

use Illuminate\Database\Eloquent\Model;

class CallFile extends Model
{
    protected $connection = 'hn_admin';
    protected $primaryKey = 'Oid';
    protected $increment = false;

    public static function findByName($name)
    {
        return static::where('Name', $name)->first();
    }

    
}
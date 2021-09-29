<?php

namespace Armcanada\Dialer\Domain\Calls\Models;

use Illuminate\Database\Eloquent\Model;

class CallFileDefinition extends Model
{
    protected $connection = 'hn_admin';
    protected $primaryKey = 'Oid';
    protected $increment = false;
    protected $table = 'CallFile';
    protected $keyType = 'string';

    public static function findByName($name)
    {
        return static::where('Name', $name)->first();
    }

    
}
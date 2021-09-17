<?php

namespace Armcanada\Dialer\Domain\Campaigns;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $connection = 'dialer_admin';
    protected $primaryKey = 'Oid';
    protected $increment = false;

    /**
     * @param string description is called name in the dialer UI
     */
    public static function findByDescription($description)
    {
        return self::where('Description', $description)->first();
    }

    
}
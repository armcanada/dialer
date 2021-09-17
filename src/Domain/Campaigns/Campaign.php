<?php

namespace Armcanada\Dialer\Domain\Campaigns;

use Armcanada\Dialer\Domain\Calls\Models\CallFile;
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

    public function callFile()
    {
        return $this->hasOne(CallFile::class, 'CampaignID', 'DID');
    }

    
}
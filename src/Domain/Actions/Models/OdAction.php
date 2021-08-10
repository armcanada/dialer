<?php

namespace Armcanada\Dialer\Domain\Actions\Models;

use Armcanada\Dialer\Support\TimeUtils;
use Illuminate\Database\Eloquent\Model;

class OdAction extends Model
{
    protected $connection = 'odcalls';
    protected $table = 'vwAgentsActions';

    public function getDurationString()
    {
        TimeUtils::csToString($this->Duration);
    }

}
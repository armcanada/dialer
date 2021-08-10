<?php

namespace Armcanada\Dialer\Domain\Calls\Models;

use Illuminate\Database\Eloquent\Model;

class CallType extends Model
{
    protected $connection = 'odcalls';
    protected $primaryKey = 'CallType';

    const INBOUND = 1;
}
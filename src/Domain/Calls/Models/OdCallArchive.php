<?php

namespace Armcanada\Dialer\Domain\Calls\Models;

class OdCallArchive extends OdCall
{
    protected $connection = 'od_archive';
    protected $primaryKey = 'ID';
    protected $keyType = 'string';
    protected $casts = ['ID' => 'string'];

    public $incrementing = false;
}
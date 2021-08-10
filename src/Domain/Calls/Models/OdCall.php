<?php

namespace Armcanada\Dialer\Domain\Calls\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class OdCall extends Model
{
    protected $connection = 'odcalls';
    protected $primaryKey = 'ID';
    protected $keyType = 'string';
    protected $casts = ['ID' => 'string'];
    protected $table = 'ODCalls';

    public $incrementing = false;

    public function scopeReceived($query)
    {
        return $query->where(function($q) {
            $q->whereNotNull('FirstCampaign')->orWhereNotNull('LastCampaign');
        })
        ->where('Closed', 0)
        ->where('FirstQueue', '!=', 0);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('CallLocalTime', Carbon::now()->format('Y-m-d'));
    }

    public function scopeInQueues($query, $queues)
    {
        return $query->where(function($q) use ($queues) {
            $q->whereIn('FirstQueue', Arr::wrap($queues))->orWhere('LastQueue', Arr::wrap($queues));
        });
    }

    public function scopeAnswered($query)
    {
        return $this->scopeReceived($query)
        ->where('Abandon', 0);
    }

    public function scopeInVoicemail($query)
    {
        return $this->scopeReceived($query)
        ->where('Overflow', '>', 0);
    }

    public function scopeIsInCampaign($query)
    {
        return $query->where(function($q) {
            $q->whereNotNull('FirstCampaign')->orWhereNotNull('LastCampaign');
        });
    }

    public function scopeInbound($query)
    {
        return $query->where('CallType', CallType::INBOUND);
    }

    public function scopeFilterValidDistinguishableAni($query)
    {
        return $query->whereNotNull('ANI')
        ->where('ANI', '!=', '')
        ->where('ANI', '!=', 'anonymous');
    }

}
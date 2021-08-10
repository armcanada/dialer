<?php

namespace Armcanada\Dialer\Support;

class TimeUtils
{

    public static function parseCs($cs)
    {
        $hours = $cs / 100 / 60 / 60;
        $minutes = fmod($hours, 1) * 60;
        $seconds = fmod($minutes, 1) * 60;

        return [
            'hours' => (int) floor($hours),
            'minutes' => (int) floor($minutes),
            'seconds' => (int) floor($seconds)
        ];
    }

    public static function csToString($cs)
    {
        $parsedCs = self::parseCs($cs);
        foreach($parsedCs as $key=>$part) {
            $parsedCs[$key] = str_pad($part, 2, '0', STR_PAD_LEFT);
        }
        return implode(':', $parsedCs);
    }
}
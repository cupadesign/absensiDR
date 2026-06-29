<?php

namespace App\Services;

class GeoFenceService
{
    public static function distanceMeter($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371000; // meter

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a =
            sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    public static function isInside($userLat, $userLon, $roomLat, $roomLon, $radius)
    {
        $distance = self::distanceMeter($userLat, $userLon, $roomLat, $roomLon);

        return [
            'distance' => $distance,
            'inside' => $distance <= $radius
        ];
    }
}

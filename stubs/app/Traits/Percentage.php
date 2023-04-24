<?php

namespace App\Traits;

trait Percentage
{
    public function createPercentage($newValue, $oldValue): int|float
    {
//        if ($newValue == 0 && $oldValue == 0) {
//            return 0;
//        }
        if ($oldValue == 0) {
            return 0;
        }

        return round((($newValue - $oldValue) / $oldValue) * 100, 2);
    }

    public function devicesPercentage($deviceCount, $total): float|int
    {
        if ($total === 0) {
            return 0;
        }

        return round(($deviceCount / $total) * 100, 2);
    }
}

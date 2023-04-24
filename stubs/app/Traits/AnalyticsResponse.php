<?php

namespace App\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

trait AnalyticsResponse
{
    use Percentage;

    public function formatSessionSources(array $table): array
    {
        $sources = [
            'facebook' => 0,
            'instagram' => 0,
            'google' => 0,
            'bing' => 0,
        ];
        foreach ($table as $item) {
            switch ($item['sessionSource']) {
                case Str::contains($item['sessionSource'], 'facebook'):
                    $sources['facebook'] += $item['totalUsers'];
                    break;
                case Str::contains($item['sessionSource'], 'instagram'):
                    $sources['instagram'] += $item['totalUsers'];
                    break;
                case Str::contains($item['sessionSource'], 'google'):
                    $sources['google'] += $item['totalUsers'];
                    break;
                case Str::contains($item['sessionSource'], 'bing'):
                    $sources['bing'] += $item['totalUsers'];
                    break;
            }
        }

        return array_merge(
            ['result' => $table], $sources
        );
    }

    public function formatTraffic(array $table): array
    {
        foreach ($table as &$item) {
            if (! isset($item['sessionSource'])) {
                continue;
            }
            $item['date'] = Carbon::parse($item['sessionSource'])->format('d-m-Y');
            unset($item['sessionSource']);
        }

        return $table;
    }

    public function formatUserDifference(array $table): array
    {
        $yesterday = \Arr::last($table);
        $dayBefore = \Arr::first($table);

        return [
            'today' => $yesterday['totalUsers'] ?? 0,
            'percentage' => $this->createPercentage($yesterday['totalUsers'] ?? 0, $dayBefore['totalUsers'] ?? 0),

        ];
    }

    public function formatMostViewedPages(array $table): array
    {
        return collect($table)
            ->reject(function ($item) {
                return $item['pageTitle'] ?? $item['sessionSource'] == '(not set)';
            })->map(function ($item) {
                if (! isset($item['sessionSource']) && ! isset($item['date'])) {
                    return $item;
                }
                $item['pageTitle'] = $item['sessionSource'];
                $item['fullPageUrl'] = $item['date'];
                unset($item['date']);
                unset($item['sessionSource']);

                return $item;
            })
            ->values()
            ->toArray();
    }

    public function formatAverageSessionTime(array $table): array
    {
        foreach ($table as &$dateRange) {
            if (! isset($dateRange['sessionSource']) && ! isset($dateRange['totalUsers'])) {
                continue;
            }
            $dateRange['dateRange'] = $dateRange['sessionSource'];
            $dateRange['averageSessionDuration'] = $dateRange['totalUsers'];
            unset($dateRange['sessionSource']);
            unset($dateRange['totalUsers']);
        }

        $yesterday = \Arr::last($table);
        $dayBefore = \Arr::first($table);

        return [
            'new' => round($yesterday['averageSessionDuration'] ?? 0.00, 2),
            'old' => round($dayBefore['averageSessionDuration'] ?? 0.00, 2),
            'percentage' => $this->createPercentage($yesterday['averageSessionDuration'] ?? 0, $dayBefore['averageSessionDuration'] ?? 0),
        ];
    }
}

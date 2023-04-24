<?php

namespace App\Http\Controllers\Adminify;

use AkkiIo\LaravelGoogleAnalytics\Facades\LaravelGoogleAnalytics;
use AkkiIo\LaravelGoogleAnalytics\Period;
use AkkiIo\LaravelGoogleAnalytics\Traits\ResponseTrait;
use App\Traits\AnalyticsResponse;
use App\Traits\BatchAnalytics;
use App\Traits\Percentage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AnalyticsController extends Controller
{
    use ResponseTrait, BatchAnalytics, AnalyticsResponse, Percentage;

    public function sources(Request $request)
    {
        $period = $this->getQueryPeriod(Period::create(
            Carbon::yesterday()->subDays(2)->startOfDay(),
            Carbon::yesterday()->subDays(2)->endOfDay()
        ));
        $result = LaravelGoogleAnalytics::dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('sessionSource')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;

        return response()->json($this->formatSessionSources($result));
    }

    public function traffic(Request $request)
    {
        $period = $this->getQueryPeriod(Period::months(2));
        $result = LaravelGoogleAnalytics::getTotalUsersByDate($period);

        return response()->json($this->formatTraffic($result));
    }

    public function totalUsersYesterday()
    {
        $result = LaravelGoogleAnalytics::dateRanges(
            Period::create(
                Carbon::yesterday()->subDays(2)->startOfDay(),
                Carbon::yesterday()->subDays(2)->endOfDay()
            ),
            Period::create(
                Carbon::yesterday()->subDay()->startOfDay(),
                Carbon::yesterday()->subDay()->endOfDay())
        )
            ->metrics('totalUsers')
            ->get()
            ->table;

        return response()->json($this->formatUserDifference($result));
    }

    public function averageSessionTime(\Request $request)
    {
        $result = LaravelGoogleAnalytics::dateRanges(
            Period::create(
                Carbon::yesterday()->subDays(2)->startOfDay(),
                Carbon::yesterday()->subDays(2)->endOfDay()
            ),
            Period::create(
                Carbon::yesterday()->subDays()->startOfDay(),
                Carbon::yesterday()->subDays()->endOfDay()
            )
        )
            ->metrics('averageSessionDuration')
            ->get()
            ->table;

        return response()->json($this->formatAverageSessionTime($result));
    }

    public function mostViewedPages(Request $request)
    {
        $response = LaravelGoogleAnalytics::getMostViewsByPage(
            $this->getQueryPeriod(Period::days(30), 5)
        );
        $result = $this->formatMostViewedPages($response);

        return response()->json($result);
    }

    public function countries()
    {
        $period = $this->getQueryPeriod(Period::years(1));

        return response()->json(
            LaravelGoogleAnalytics::getTotalUsersByCountry($period)
        );
    }

    public function batch()
    {
        $requestsNames = [
            'sessionSources',
            'traffic',
            'userDifferences',
            'avgSessionDuration',
            'mostViewedPages',
        ];
        $response = LaravelGoogleAnalytics::getClient()->batchRunReports(
            [
                'property' => 'properties/'.config('laravel-google-analytics.property_id'),
                'requests' => [
                    $this->sessionsSourcesRequest(),
                    $this->getTraffic(),
                    $this->usersDifferenceStatistic(),
                    $this->getAverageSessionDuration(),
                    $this->batchMostViewedPages(8),
                ],
            ],
        );

        foreach ($response->getReports()->getIterator() as $key => $report) {
            $table[$requestsNames[$key]] = $this->formatResponse($report)->table;
        }

        $table['sessionSources'] = $this->formatSessionSources($table['sessionSources']);
        $table['traffic'] = $this->formatTraffic($table['traffic']);
        $table['userDifferences'] = $this->formatUserDifference($table['userDifferences']);
        $table['avgSessionDuration'] = $this->formatAverageSessionTime($table['avgSessionDuration']);
        $table['mostViewedPages'] = $this->formatMostViewedPages($table['mostViewedPages']);

        return response()->json($table);
    }
}

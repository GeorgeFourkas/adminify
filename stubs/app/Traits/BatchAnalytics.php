<?php

namespace App\Traits;

use AkkiIo\LaravelGoogleAnalytics\Period;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\OrderBy;
use Google\Analytics\Data\V1beta\OrderBy\MetricOrderBy;
use Google\Analytics\Data\V1beta\RunReportRequest;
use Illuminate\Support\Carbon;

trait BatchAnalytics
{
    public function getQueryPeriod(Period $default, string $startRequestIndex = 'start', string $endRequestIndex = 'end'): Period
    {
        if (\Request::has($startRequestIndex) && \Request::has($endRequestIndex)) {
            return Period::create(
                Carbon::createFromFormat('d-m-Y', \Request::get($startRequestIndex))->startOfDay(),
                Carbon::createFromFormat('d-m-Y', \Request::get($endRequestIndex))->endOfDay()
            );
        }

        return $default;
    }

    public function sessionsSourcesRequest($startDate = null, $endDate = null): RunReportRequest
    {
        if ($startDate && $endDate) {
            $period = Period::create(
                Carbon::createFromFormat('d-m-Y', $startDate)->startOfDay(),
                Carbon::createFromFormat('d-m-Y', $endDate)->endOfDay()
            );
        } else {
            $period = Period::create(
                Carbon::yesterday()->subDays(50)->startOfDay(),
                Carbon::yesterday()->subDays(2)->endOfDay()
            );
        }

        return (new RunReportRequest())
            ->setProperty('properties/'.config('laravel-google-analytics.property_id'))
            ->setDateRanges(
                [
                    (new DateRange())
                        ->setStartDate($period->startDate->toDateString())
                        ->setEndDate($period->endDate->toDateString()),
                ])
            ->setDimensions(
                [
                    (new Dimension())->setName('sessionSource'),
                ]
            )->setMetrics(
                [
                    (new Metric())->setName('totalUsers'),
                ]
            )->setOrderBys(
                [
                    (new OrderBy())
                        ->setDesc(true)
                        ->setMetric((new MetricOrderBy())->setMetricName('totalUsers')),
                ]
            );
    }

    public function getTraffic(string $startDate = null, string $endDate = null): RunReportRequest
    {
        if ($startDate && $endDate) {
            $period = Period::create(
                Carbon::createFromFormat('d-m-Y', $startDate)->startOfDay(),
                Carbon::createFromFormat('d-m-Y', $endDate)->endOfDay()
            );
        } else {
            $period = Period::create(
                Carbon::yesterday()->subDays(50)->startOfDay(),
                Carbon::yesterday()->subDays()->endOfDay()
            );
        }

        return (new RunReportRequest())
            ->setProperty('properties/'.config('laravel-google-analytics.property_id'))
            ->setDateRanges(
                [
                    (new DateRange())
                        ->setStartDate($period->startDate->toDateString())
                        ->setEndDate($period->endDate->toDateString()),
                ])
            ->setDimensions(
                [
                    (new Dimension())->setName('date'),
                ]
            )->setMetrics(
                [
                    (new Metric())->setName('totalUsers'),
                ]
            )->setOrderBys(
                [
                    (new OrderBy())
                        ->setDesc(false)
                        ->setDimension((new OrderBy\DimensionOrderBy())->setDimensionName('date')),
                ]
            )->setKeepEmptyRows(true);
    }

    public function usersDifferenceStatistic(): RunReportRequest
    {
        $period1 = Period::create(
            Carbon::now()->subWeek()->startOfDay(),
            Carbon::today()->startOfDay()
        );
        $period2 = Period::create(
            Carbon::now()->subWeeks(2)->startOfDay(),
            Carbon::today()->subWeek()->startOfDay()
        );

        return (new RunReportRequest())
            ->setProperty('properties/'.config('laravel-google-analytics.property_id'))
            ->setDateRanges(
                [
                    (new DateRange())
                        ->setStartDate($period1->startDate->toDateString())
                        ->setEndDate($period1->endDate->toDateString()),
                    (new DateRange())
                        ->setStartDate($period2->startDate->toDateString())
                        ->setEndDate($period2->endDate->toDateString()),
                ]
            )
            ->setMetrics(
                [
                    (new Metric())->setName('totalUsers'),
                ]
            );
    }

    public function getAverageSessionDuration(): RunReportRequest
    {
        $period1 = Period::create(
            Carbon::now()->subWeek()->startOfDay(),
            Carbon::today()->startOfDay()
        );
        $period2 = Period::create(
            Carbon::now()->subWeeks(2)->startOfDay(),
            Carbon::today()->subWeek()->startOfDay()
        );

        return (new RunReportRequest())
            ->setProperty('properties/'.config('laravel-google-analytics.property_id'))
            ->setDateRanges(
                [
                    (new DateRange())
                        ->setStartDate($period1->startDate->toDateString())
                        ->setEndDate($period1->endDate->toDateString()),
                    (new DateRange())
                        ->setStartDate($period2->startDate->toDateString())
                        ->setEndDate($period2->endDate->toDateString()),
                ])
            ->setMetrics(
                [
                    (new Metric())->setName('averageSessionDuration'),
                ]
            );
    }

    public function batchMostViewedPages(int $limit = 8): RunReportRequest
    {

        $period = Period::create(
            Carbon::today()->subMonths(12)->startOfDay(),
            Carbon::today()->endOfDay()
        );

        return (new RunReportRequest())
            ->setProperty('properties/'.config('laravel-google-analytics.property_id'))
            ->setDateRanges(
                [
                    (new DateRange())
                        ->setStartDate($period->startDate->toDateString())
                        ->setEndDate($period->endDate->toDateString()),
                ]
            )->setMetrics(
                [
                    (new Metric())->setName('screenPageViews'),
                ]
            )->setDimensions([
                (new Dimension())->setName('pageTitle'),
                (new Dimension())->setName('fullPageUrl'),
            ])
            ->setOrderBys([
                (new OrderBy())
                    ->setMetric((new MetricOrderBy())
                        ->setMetricName('screenPageViews'))
                    ->setDesc(true),
            ])
            ->setLimit($limit);
    }
}

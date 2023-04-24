<?php

namespace App\Http\Controllers\Adminify;

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\ApiCore\ApiException;

class LiveAnalyticsController extends Controller
{
    /**
     * @throws ApiException
     */
    public function __invoke()
    {
        $totalActiveUsers = 0;
        $devices = [];
        putenv('GOOGLE_APPLICATION_CREDENTIALS='.config('laravel-google-analytics.service_account_credentials_json'));
        $client = new BetaAnalyticsDataClient();
        $response = $client->runRealtimeReport([
            'property' => 'properties/'.config('laravel-google-analytics.property_id'),
            'metrics' => [
                new Metric(
                    [
                        'name' => 'activeUsers',
                    ]
                ),
            ],
            'dimensions' => [new Dimension(['name' => 'deviceCategory'])],
        ]);

        foreach ($response->getRows() as $row) {
            $deviceName = $row->getDimensionValues()[0]->getValue();
            $active_users = $row->getMetricValues()[0]->getValue();
            if ($this->isDesktopMobileOrTablet($deviceName)) {
                $devices[$deviceName] = $active_users;
                $totalActiveUsers += $active_users;
            }

        }

        return response()->json([
            'activeUsers' => $totalActiveUsers,
            'devices' => $devices,
        ]);
    }

    protected function isDesktopMobileOrTablet($deviceName)
    {
        return in_array($deviceName, ['desktop', 'mobile', 'tablet']);
    }
}

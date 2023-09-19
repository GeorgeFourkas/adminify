<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Adminify\StoreAnalyticsCredentialsFileRequest;
use Illuminate\Support\Facades\File;

class JsonCredentialsAnalyticsController extends Controller
{
    public function __invoke(StoreAnalyticsCredentialsFileRequest $request)
    {
        File::cleanDirectory(storage_path('app/analytics'));
        $request->credentials->storeAs('analytics', $request->credentials->getClientOriginalName());

        return redirect()
            ->route('settings')
            ->with('success', __('adminify.analytics_json_success'));
    }
}

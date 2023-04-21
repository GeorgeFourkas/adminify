<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnalyticsCredentialsFileRequest;
use Illuminate\Support\Facades\File;

class JsonCredentialsAnalyticsController extends Controller
{
    public function __invoke(StoreAnalyticsCredentialsFileRequest $request)
    {
        File::cleanDirectory(storage_path('app/analytics'));
        $request->credentials->storeAs('analytics', $request->credentials->getClientOriginalName());

        return redirect()
            ->route('settings')
            ->with('success', __('File Saved Successfully. Update the .env value for the change to take effect'));
    }
}

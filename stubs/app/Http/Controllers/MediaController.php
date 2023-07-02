<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Models\Adminify\Media;
use App\Traits\FileUploadOrSync;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    use FileUploadOrSync;

    public function show()
    {
        return response()->json(
            Media::latest()->paginate(40)
        );
    }

    public function upload(Request $request)
    {

        $this->createMediaModel($request->uploaded_file, 'public/media');

        return redirect()
            ->route('media')
            ->with('success', __('Media uploaded successfully'));
    }

    /*
     * CKEditor  Media Upload Endpoint...
     */
    public function store(Request $request)
    {
        $media = $this->createMediaModel($request->upload, 'public/media');

        return response()->json([
            'url' => $media->url,
        ]);
    }

    public function destroy(Request $request, Media $media)
    {
        $media->delete();
        \Storage::delete($media->url);

        return redirect()->route('media')->with('success', __('Media Deleted Successfully'));

    }
}

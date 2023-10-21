<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Controllers\Controller;
use App\Traits\FileUploadOrSync;
use Illuminate\Http\Request;

class FilePondController extends Controller
{

    use FileUploadOrSync;

    public function fp(Request $request)
    {
        $media = [];

        foreach ($request->file() as $file) {
            if (is_array($file)) {
                foreach ($file as $subFile){
                    $media[] = $this->createMediaModel($subFile, 'public/fp');
                }
            } else {
                $media[] = $this->createMediaModel($file, 'public/fp');
            }
        }

        return response()->json($media);
    }
}

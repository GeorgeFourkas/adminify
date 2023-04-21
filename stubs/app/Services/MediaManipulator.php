<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Http\UploadedFile;

class MediaManipulator
{
    protected UploadedFile $file;

    protected Media $mediaModel;

    public function setUploadedFile(UploadedFile $file)
    {
        $this->file = $file;

        return $this;
    }

    public function setMediaModel(Media $media)
    {
        $this->mediaModel = $media;
    }
}

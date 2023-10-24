<?php

namespace App\Traits;

use App\Models\Adminify\Media;
use Arr;
use Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait FileUploadOrSync
{
//    public function createOrSync(Model $model, UploadedFile|string $item, $folder = 'public/posts'): void
//    {
//        is_string($item)
//            ? $this->sync($model, $item)
//            : $this->uploadNew($model, $item, $folder);
//    }
//
//    public function sync($model, $item): void
//    {
//        $model->media()->sync($item);
//    }
//
//    public function uploadNew($model, $item, $folder): void
//    {
//        $model
//            ->media()
//            ->sync(
//                $this->createMediaModel($item, $folder)
//            );
//    }
//
    public function createMediaModel(UploadedFile $item, $folder)
    {
        $url = Storage::url(Storage::put($folder, $item));
        $name = Arr::last(explode('/', $url));
        $fileSize = getimagesize(storage_path('/app/' . $folder . '/' . $name));
        return Media::create([
                'url' => $url,
                'size' => $item->getSize(),
                'extension' => $item->extension(),
                'original_name' => $item->getClientOriginalName(),
                'width' => $fileSize[0],
                'height' => $fileSize[1],
                'user_id' => Auth::id(),
            ]
        );
    }
}

<?php

namespace App\Traits;

use App\Models\Adminify\Media;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasMedia
{
    public function media(): MorphToMany
    {
        return $this->morphToMany(Media::class, 'mediable');
    }


    public function uploadOrAttach(UploadedFile|string $item, $folder = 'public/posts')
    {
        if (is_string($item)) {
            $this->media()->attach((int)$item);
        } else {
            $this->media()->create($this->formMediaModelValues($item, $folder));
        }
    }

    public function uploadOrSync(array|string $items, $folder = 'public/posts')
    {

    }


    public function formMediaModelValues(UploadedFile $item, $folder = 'public/posts'): array
    {
        $url = Storage::url(Storage::put($folder, $item));
        $name = \Arr::last(explode('/', $url));
        $fileSize = getimagesize(storage_path('/app/' . $folder . '/' . $name)) ?? [];

        return [
            'url' => $url,
            'size' => $item->getSize(),
            'extension' => $item->extension(),
            'original_name' => $item->getClientOriginalName(),
            'width' => $fileSize[0] ?? '-',
            'height' => $fileSize[1] ?? '-',
            'user_id' => \Auth::id(),
        ];
    }

    /**
     * @param array<UploadedFile> $files
     * @return void
     */
    public function uploadWithoutDuplicates(array $files, $folder = 'public/posts')
    {
        $originalNamesUsed = [];
        foreach ($files as $file) {
            if (in_array($file->getClientOriginalName(), $originalNamesUsed)) {
                continue;
            }
            $this->uploadNew($file, $folder);
            $originalNamesUsed[] = $file->getClientOriginalName();
        }
    }


    public function createMediaModel(UploadedFile $item, $folder)
    {

        $url = Storage::url(Storage::put($folder, $item));

        $name = \Arr::last(explode('/', $url));
        $fileSize = getimagesize(storage_path('/app/' . $folder . '/' . $name));

        return Media::create([
                'url' => $url,
                'size' => $item->getSize(),
                'extension' => $item->extension(),
                'original_name' => $item->getClientOriginalName(),
                'width' => $fileSize[0],
                'height' => $fileSize[1],
                'user_id' => \Auth::id(),
            ]
        );
    }

}

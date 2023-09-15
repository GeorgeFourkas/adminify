<?php

namespace App\Traits;

use App\Models\Adminify\Media;
use Auth;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
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
            $this->media()->attach((int) $item);
        } else {
            $this->media()->create($this->formMediaModelValues($item, $folder));
        }
    }

    public function bulkUploadOrAttach(array $items): static
    {
        $toAttach = [];
        $fileItems = [];
        foreach ($items as $item) {

            if (is_string($item)) {
                $toAttach[] = $item;
            } elseif ($item instanceof UploadedFile) {
                $fileItems[] = $this->formMediaModelValues($item);
            }
        }

        if (! empty($toAttach)) {
            $this->media()->attach($toAttach);
        }

        if (! empty($fileItems)) {
            $this->media()->createMany($fileItems);
        }

        return $this;
    }

    public function uploadOrSync(array|string $items, $folder = 'public/posts')
    {

    }

    public function formMediaModelValues(UploadedFile $item, $folder = 'public/posts'): array
    {
        $url = Storage::url(Storage::put($folder, $item));
        $name = \Arr::last(explode('/', $url));
        $fileSize = getimagesize(storage_path('/app/'.$folder.'/'.$name)) ?? [];

        return [
            'url' => $url,
            'size' => $item->getSize(),
            'extension' => $item->extension(),
            'original_name' => $item->getClientOriginalName(),
            'width' => $fileSize[0] ?? '-',
            'height' => $fileSize[1] ?? '-',
            'user_id' => Auth::id(),
        ];
    }

    public function uploadWithoutDuplicates(array $files, $folder = 'public/posts'): void
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

        $name = Arr::last(explode('/', $url));
        $fileSize = getimagesize(storage_path('/app/'.$folder.'/'.$name));

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

    public function uploadMedia(array|UploadedFile $media)
    {

    }

    public function uploadMultipleDropzone(array $filesIndex): void
    {
        $this->detachExistingMedia($filesIndex['detach'] ?? []);

        $this->attachExistingFiles($filesToUpload['already_uploaded'] ?? []);

        $this->uploadNewMedia($filesIndex['files_to_upload'] ?? []);
    }

    private function detachExistingMedia(array $detach): void
    {
        if (empty($detach)) {
            return;
        }

        $this->media()->detach($detach);
    }

    private function attachExistingFiles(array $attach): void
    {
        if (empty($attach)) {
            return;
        }

        $this->media()->attach($attach);
    }

    private function uploadNewMedia(array $newUploads): void
    {
        if (empty($newUploads)) {
            return;
        }

        $mediaModels = [];
        foreach ($newUploads as $file) {
            $mediaModels[] = $this->formMediaModelValues($file);
        }

        $this->media()->createMany($mediaModels);
    }
}

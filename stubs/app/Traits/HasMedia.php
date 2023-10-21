<?php

namespace App\Traits;

use App\Models\Adminify\Media;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait HasMedia
{
    public function media(): MorphToMany
    {
        return $this->morphToMany(Media::class, 'mediable');
    }

    public function saveMedia(array|string|null $files): void
    {
        $mediaIds = collect(is_array($files) ? $files : [$files])
            ->map(fn ($item) => $this->decodeAndGetProp($item))
            ->filter()
            ->toArray();

        $this->media()->sync($mediaIds);

        //        $mediaIds = [];
        //
        //        is_array($files)
        //            ? collect($files)
        //            ->each(function ($item) use (&$mediaIds) {
        //                 $mediaIds[] = $this->decodeAndGetProp($item);
        //            })
        //            : $mediaIds = $this->decodeAndGetProp($files);
        //
        //
        //        $mediaIds = collect($mediaIds)
        //            ->reject(fn($item) => is_null($item))
        //            ->toArray();
        //
        //        $this->media()->sync($mediaIds ?? []);

    }

    private function decodeAndGetProp(?string $json)
    {
        $decoded = json_decode($json);

        if (is_array($decoded)) {
            $decoded = current($decoded);
        }

        return $decoded->id ?? null;
    }

    public function uploadOrAttach(UploadedFile|string $item, $folder = 'public/posts'): void
    {
        is_string($item)
            ? $this->media()->attach((int) $item)
            : $this->media()->create($this->formMediaModelValues($item, $folder));
    }

    public function createMediaModel(UploadedFile $item, $folder)
    {
        return Media::create($this->formMediaModelValues($item, $folder));
    }

    public function formMediaModelValues(UploadedFile $item, $folder = 'public/posts'): array
    {
        $url = Storage::url(Storage::put($folder, $item));
        $name = Arr::last(explode('/', $url));
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
}

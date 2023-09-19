<?php

namespace App\Traits;

use App\Models\Adminify\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ReplaceSameFilesWithUniqueIds
{
    public function uploadPostMediaWithoutDuplicates(Post $post, Request $request): void
    {
        $originalFileNames = [];
        foreach ($post->translations as $translation) {
            $localeIndex = $request->{$translation->locale};
            if ($localeIndex['featured_image_url'] instanceof UploadedFile) {
                $file = $request->file($translation->locale)['featured_image_url'];
                $names = collect($originalFileNames)
                    ->map(function ($item) {
                        return $item['original_name'];
                    });
                if (! in_array($file->getClientOriginalName(), $names->toArray())) {
                    $media = $translation->media()->create([
                        'url' => Storage::url(Storage::put('public/posts', $file)),
                        'size' => $file->getSize(),
                        'extension' => $file->extension(),
                    ]);
                    $originalFileNames[] = [
                        'original_name' => $file->getClientOriginalName(),
                        'id' => $media->id,
                    ];
                } else {
                    $item = collect($originalFileNames)
                        ->filter(function ($item) use ($file) {
                            return $item['original_name'] == $file->getClientOriginalName();
                        })
                        ->get('id');
                    $translation
                        ->media()
                        ->sync($item);
                }
            } else {
                $translation->media()->attach($localeIndex['featured_image_url']);
            }
        }
    }
}

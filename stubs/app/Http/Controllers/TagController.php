<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Requests\Tag\DeleteTagRequest;
use App\Models\Adminify\Tag;
use App\Services\TagService;
use App\Traits\HasNullRequestValues;
use App\Traits\Multilingual;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use Multilingual, HasNullRequestValues;

    public function show(Request $request)
    {
        return response()->json([
            'tags' => Tag::with('translations')
                ->whereTranslationLike('name', '%'.$request->search.'%', \App::getLocale())
                ->get(),
        ]);
    }

    public function store(Request $request)
    {
        $tag = Tag::create($this->removeNullLanguageRequestIndex($request->only($this->getAllDeclaredLanguages())));

        if ($request->expectsJson()) {
            return response()->json($tag);
        }

        return redirect()
            ->route('tags')
            ->with('success', __('Tag Created Successfully'));
    }

    public function update(Request $request, Tag $tag, TagService $service)
    {
        $service
            ->setData($request->only($this->getAllDeclaredLanguages()))
            ->setTag($tag)
            ->getPresentLocales()
            ->syncTranslations()
            ->update();

        return redirect()
            ->route('tags')
            ->with('success', __('Tag Updated Successfully'));
    }

    public function destroy(DeleteTagRequest $r, Tag $tag)
    {
        $tag->delete();

        return redirect()
            ->route('tags')
            ->with('success', __('Tag Delete Successfully'));
    }
}

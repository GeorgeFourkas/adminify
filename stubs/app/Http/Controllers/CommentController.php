<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Models\Adminify\Comment;
use App\Models\Adminify\Post;
use GPBMetadata\Google\Api\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $post->comments()->create([
            'body' => $request->body,
            'user_id' => Auth::id() ?? '',
        ]);

        return redirect()->back();
    }

    public function approve(Comment $comment)
    {
        $comment->approved = !$comment->approved;
        $comment->save();
        $status = $comment->approved ? __('adminify.approved') : __('adminify.unpublished');

        return redirect()
            ->back()
            ->with('success', __('adminify.comment') . ' ' . $status);
    }

    public function delete(Comment $comment)
    {
        $comment->delete();

        return redirect()
            ->back()
            ->with('success', __('comment deleted successfully'));
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->body);

        return redirect()->back()->with('success', __('comment updated successfully'));
    }
}

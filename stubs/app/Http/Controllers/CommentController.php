<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use GPBMetadata\Google\Api\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $post->comments()->create([
            'body' => $request->body,
            'user_id' => Auth::id() ?? ''
        ]);
        return redirect()->back();
    }

    public function approve(Comment $comment)
    {
        $comment->approved = !$comment->approved;
        $comment->save();
        $status = $comment->approved ? __('aprooved') : __('unpublished');
        return redirect()
            ->back()
            ->with('success', __('comment') . ' ' . $status);
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

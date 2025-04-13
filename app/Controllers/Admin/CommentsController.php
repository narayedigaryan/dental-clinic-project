<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseControllers;
use App\Models\comments;

class CommentsController extends BaseControllers
{
    public function admin_comments()
    {
        $comments = Comments::query()->get();
        return view('admin/includes/admin_comments', ['title' => 'Comments','comments'=>$comments], 'layouts/default');

    }
    public function store_comments_reply()
    {
        $comment_id = request()->post('id');
        $reply = request()->post('reply');
        if (!$comment_id) {
            session()->setFlash('error', 'Comment ID is missing!');
            response()->redirect(base_url('/admin'));
            return;
        }
        // Check if comment exists
        $comment = comments::query()->where('id', $comment_id)->first();

        if (!$comment) {
            session()->setFlash('error', 'Comment not found!');
            response()->redirect(base_url('/admin'));
            return;
        }

        // Update the existing comment with reply
        comments::query()->where('id', $comment_id)->update([
            'reply' => $reply
        ]);

        session()->setFlash('success', 'Reply added successfully!');
        response()->redirect(base_url('/admin_comments'));
    }

}
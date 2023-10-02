<?php

namespace App\Http\Controllers;
use App\Models\Comment;


class DeleteCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id, Comment $comment)
    {
        $comment->delete();

        return back();
    }
}
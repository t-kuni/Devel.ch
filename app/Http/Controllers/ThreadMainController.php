<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCommentRequest;
use App\ThreadComment;
use App\Thread;
use DB;
use App\Image;
use Markdown;

class ThreadMainController extends Controller
{
    //
    public function showThread(Request $request) {
        return view('thread_main', [
            'thread' => $request->thread,
        ]);
    }

    public function postComment(PostCommentRequest $request) {

        DB::transaction(function () use ($request) {
            $image = null;
            if ($request->image !== null) {
                $image = new Image();
                $image->image     = file_get_contents($request->image);
                $image->mime_type = $request->image->getMimeType();
                $image->save();
            }

            $comment = new ThreadComment();
            $comment->name      = $request->name;
            $comment->text      = Markdown::convertToHtml($request->text);
            $comment->password  = $request->password;
            $comment->thread_id = $request->id;
            $comment->image_id  = $image !== null ? $image->id : null;
            $comment->save();
        });

        return redirect()->route('showThread', $request->id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeleteThreadRequest;
use App\Http\Requests\PostCommentRequest;
use App\ThreadComment;
use App\Thread;
use DB;
use App\Image;

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
            $comment->text      = $request->text;
            $comment->password  = $request->password;
            $comment->thread_id = $request->id;
            $comment->image_id  = $image !== null ? $image->id : null;
            $comment->save();
        });

        return redirect()->route('showThread', $request->id);
    }

    public function deleteThread(DeleteThreadRequest $request) {
        $thread = Thread::where('id', $request->id)
            ->where('password', $request->password)
            ->first();

        if ($thread === null) {
            return back()->withError(['' => 'パスワードが異なります']);
        }

        $thread->delete();

        return redirect()->route('showThreadList');
    }
}

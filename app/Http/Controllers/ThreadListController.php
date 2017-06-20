<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Image;
use DB;
use App\Http\Requests\AddThreadRequest;
use Markdown;

class ThreadListController extends Controller
{
    //
    public function index() {
        $threads = Thread::all();

        return view('thread_list', [
            'threads' => $threads,
        ]);
    }

    public function addThread(AddThreadRequest $request) {
        DB::transaction(function () use ($request) {
            $image = null;
            if ($request->image !== null) {
                $image = new Image();
                $image->image = file_get_contents($request->image);
                $image->mime_type = $request->image->getMimeType();
                $image->save();
            }

            $thread = new Thread();
            $thread->title    = $request->title;
            $thread->password = $request->password;
            $thread->text     = Markdown::convertToHtml($request->text);
            $thread->image_id = $request->image !== null ? $image->id : null;
            $thread->save();
        });

        return redirect()->route('addThread');
    }
}

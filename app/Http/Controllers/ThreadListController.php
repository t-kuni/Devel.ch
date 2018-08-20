<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Image;
use DB;
use App\Http\Requests\AddThreadRequest;
use MetaTag;

class ThreadListController extends Controller
{
    //
    public function index(Request $request)
    {

        $thread = null;

        $sort = $request->query("sort");
        switch ($sort) {
            case "update":
                $threads = Thread::selectThreadsSortedByModifiedTime();
                break;
            case "new":
                $threads = Thread::selectThreadsSortedByCreatedTimeDesc();
                break;
            case "old":
                $threads = Thread::selectThreadsSortedByCreatedTimeAsc();
                break;
            default:
                $threads = Thread::selectThreadsSortedByModifiedTime();
                break;
        }

        return view('thread_list', [
            'threads' => $threads,
            'sort' => $sort,
        ]);
    }

    public function addThread(AddThreadRequest $request)
    {
        DB::transaction(function () use ($request) {
            $image = null;
            if ($request->image !== null) {
                $image = new Image();
                $image->image = file_get_contents($request->image);
                $image->mime_type = $request->image->getMimeType();
                $image->save();
            }

            $thread = new Thread();
            $thread->title = $request->title;
            $thread->password = $request->password;
            $thread->text = $request->text;
            $thread->image_id = $request->image !== null ? $image->id : null;
            $thread->save();
        });

        return redirect()->route('addThread');
    }
}

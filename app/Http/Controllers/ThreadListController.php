<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class ThreadListController extends Controller
{
    //
    public function index() {
        return view('thread_list');
    }

    public function addThread(Request $request) {
        $thread = new Thread();
        $thread->title    = $request->title;
        $thread->password = $request->password;
        $thread->text     = $request->text;
        $thread->image    = $request->image;
        $thread->save();
        return redirect()->route('addThread');
    }
}

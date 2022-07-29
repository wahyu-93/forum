<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Forum\Reply;
use App\Models\Forum\Thread;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Thread $thread)
    {
        $request->validate([
            'body'  => 'required|min:3'
        ]);

        auth()->user()->replies()->create([
            'body'      => $request->body,
            'thread_id' => $thread->id, 
            'hash'      => strtotime(Carbon::now()). "-" . Str::random(32),
        ]);

        toast('Your Reply Has Been Success To Publish', 'success');


        return back();
    }

    public function edit(Thread $thread, Reply $reply)
    {
        return view('thread.partial.reply.edit', compact('thread', 'reply'));
    }

    public function update(Request $request, Thread $thread, Reply $reply)
    {
        // if($reply->user_id != auth()->user()->id)
        // {
        //     abort(404);
        // };

        $this->authorize('update', $reply);

        $request->validate([
            'body'  => 'required|min:3'
        ]);

        $reply->update([
            'body' => $request->body,
        ]);

        toast('Your Reply Has Been Success To Edit', 'success');

        return redirect()->route('thread.show', [$thread->tag, $thread]);
    }
}

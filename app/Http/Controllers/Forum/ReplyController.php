<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
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

        return back();
    }
}

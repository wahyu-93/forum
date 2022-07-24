<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Forum\Reply;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Reply $reply)
    {
        $this->authorize('update', $reply->thread);

        $reply->thread->reply_id = $reply->id;
        $reply->thread->save();

        return back();
    }
}

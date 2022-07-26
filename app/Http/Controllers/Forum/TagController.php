<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Forum\Tag;
use App\Models\Forum\Thread;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Tag::get();
    }

    public function show(Tag $tag)
    {
        // $threads = Thread::where('tag_id', $tag->id)->latest()->paginate(10);
        $threads = $tag->threads()->latest()->paginate(10);
        return view('thread.index', compact('tag', 'threads'));
    }
}

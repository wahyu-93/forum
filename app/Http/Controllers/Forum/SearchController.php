<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Forum\Thread;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $query = Request('query');
        
        $threads = Thread::search($query)->paginate(10);

        return view('thread.search', compact('threads'));
    }
}

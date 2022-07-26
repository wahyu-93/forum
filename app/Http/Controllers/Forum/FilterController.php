<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Forum\Thread;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter()
    {
        $query = request('by');

        switch ($query) {
            case 'populer':
                $threads = Thread::whereHas('replies')->orderBy('replies_count', 'desc')->paginate(10);
                break;
            case 'me':
                if(auth()->check()){
                    $threads = auth()->user()->threads()->paginate(10);
                }
                else{
                    return redirect()->route('login');
                };
                break;
            case 'answered':
                $threads = Thread::whereNotNull('reply_id')->paginate(10);
                break;
            case 'unanswered':
                $threads = Thread::doesntHave('replies')->paginate(10);
                break;
            default:
                return redirect()->route('thread.index');
                break;
        }

        return view('thread.index', compact('threads', 'query'));
    }
}

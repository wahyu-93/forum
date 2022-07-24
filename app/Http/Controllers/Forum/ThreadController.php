<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadRequest;
use App\Models\Forum\Reply;
use App\Models\Forum\Tag;
use App\Models\Forum\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $threads = Thread::with('user', 'tag')->latest()->paginate(10);
        $threads = Thread::latest()->paginate(10);  

        return view('thread.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $thread = new Thread();

        return view('thread.create', compact('thread'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadRequest $request)
    {
        $slug = Str::slug($request['title']. "-" .Str::random(6));

        auth()->user()->threads()->create($this->requestThreadForm($slug));

        return redirect()->route('thread.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag, Thread $thread)
    {
        $replies = $thread->replies;
    
        return view('thread.show', compact('tag', 'thread', 'replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('thread.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThreadRequest $request, Thread $thread)
    {
        // if($thread->user_id != auth()->user()->id){
        //     abort(404);
        // };

        // policy
        $this->authorize('update', $thread);

        $slug = Str::slug($request['title']. "-" .Str::random(6));

        $thread->update($this->requestThreadForm($slug));

        return redirect()->route('thread.show',[$thread->tag, $thread]);
    }

    protected function requestThreadForm($slug)
    {       
        return [
            'title'     => request('title'),
            'tag_id'    => request('tag'),
            'slug'      => $slug,
            'body'      => request('body') 
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

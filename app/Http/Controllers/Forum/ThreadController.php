<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadRequest;
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
        $tags = Tag::get();
        return view('thread.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']. "-" .Str::random(6));

        auth()->user()->threads()->create([
            'title'     => $data['title'],
            'tag_id'    => $data['tag'],
            'slug'      => $data['slug'],
            'body'      => $data['body']  
        ]);

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
        return view('thread.show', compact('tag', 'thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

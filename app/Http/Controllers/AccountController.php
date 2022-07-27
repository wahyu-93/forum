<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('account.edit');
    }

    public function update()
    {
        $avatar_validate = 'image|mimes:jpeg,jpg,png,svg|max:2048';
        
        $avatar = request()->file('avatar');
            
        request()->validate([
            'username' => 'required||min:3|max:20|alpha_num|unique:users,username,'. Auth::id(),
            'name'     => 'required|string',
            'avatar'   => $avatar ? $avatar_validate : ''
        ]);
        
        // store photo
        $avatar_file = auth()->user()->avatar;

        if($avatar){
            $hash = auth()->user()->hash;
    
            $avatar_file = $avatar->storeAs('public-image', "{$hash}.{$avatar->extension()}");
        }

        auth()->user()->update([
            'username'  => request()->username,
            'name'      => request()->name,
            'avatar'    => $avatar_file
        ]);

        return redirect()->route('thread.filter.user', auth()->user()->usernameOrHash());
    }
}

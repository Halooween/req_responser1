<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use App\Models\user_post;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $datas=post::get();
        return view(('post.index'), compact('user','datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user)
    {
        return view('post.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepostRequest $request, $user)
    {
        $input= new post();
        $input->title= $request->input('title');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('images/', $filename);
            $input->image = $filename;
        }
        $input->description= $request->input('description');
        $input->status= $request->input('status');
        $input->user_id=$user;

        $input->save();

        return redirect()->route('user.post.index',$user)->with('success', 'new post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view(('post.show'), compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($user, $post)
    {
        //dd($post);
        $post= post::findorFail($post);

        return view(('post.edit'), compact('user','post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepostRequest  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepostRequest $request, $user, post $post)
    {
        $post->title= $request->input('title');
       
        if($request->hasfile('image'))
        {
            $image_path = 'images/'.$post->image; 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
    
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('images/', $filename);
            $post->image = $filename;
        }
        $post->description= $request->input('description');
        $post->status= $request->input('status');
    
        $post->update();

        return redirect()->route('user.post.index', $user)->with('success', 'Post Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($user, post $post)
    {
        $post->delete();
        unlink('images/'.$post->image);

        return redirect()->route('user.post.index', $user)->with('error', 'Post deleted successfully.');

    }
}

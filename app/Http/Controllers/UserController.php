<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Http\Requests\StoreuserRequest;
use App\Http\Requests\UpdateuserRequest;
use App\Models\post;
use App\Models\user_post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Resources\UsersResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datas=user_post::get();
        //dd($datas);
       //return view(('user.index'), compact('datas'));

       return UsersResource::collection(user_post::get());
       //return User::collection(Profile::all());


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreuserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreuserRequest $request)
    {
        $data= new user_post();

        $data->name= $request->input('name');
        $data->age= $request->input('age');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('images/user/', $filename);
            $data->image = $filename;
        }
        $data->bio= $request->input('bio');    
        $data->save();
       $data->message="data insertion successful";
        return new UsersResource($data);

       // return redirect()->route('user.index')->with('success', 'User Added.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user_post $user)
    {
       $user->message="data fetch successful";
        return new UsersResource($user);
        //return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user_post $user)
    {
        return view(('user.edit'), compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateuserRequest  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateuserRequest $request, user_post $user)
    {
        $user->name= $request->input('name');
        $user->age= $request->input('age');

        if($request->hasfile('image'))
        {
            $image_path = 'images/user/'.$user->image; 
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
    
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('images/user/', $filename);
            $user->image = $filename;
        }
        $user->bio= $request->input('bio');
    
        $user->update();
        return new UsersResource($user);

        //return redirect()->route('user.index')->with('success', 'User Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_post $user)
    {
        $user->delete();
        unlink('images/user/'.$user->image);
        return new UsersResource($user);

        //return redirect()->route('user.index')->with('error', 'User Deleted successfully.');
    }
}

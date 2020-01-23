<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\EditUsersResuest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return  view('admin.users.index',compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::pluck('name','id')->all();
        return  view('admin.users.create',compact('role'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsersRequest $request)
    {

         $input = $request->all();
        $input['image_id'] = 0;
        if($file = $request->file('image_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);

          $image  = Photo::create(['file'=>$name]);

            $input['image_id'] = $image->id;
        }

        $input['password'] = bcrypt($request->password);
        User::create($input);


       return redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  view('admin.users.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);
        $role = Role::pluck('name','id')->all();

        return  view('admin.users.edit',compact('user','role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUsersResuest $request, $id)
    {
        if($request->password == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        $user = User::findOrFail($id);
        $input['image_id'] = 0;
        if($image = $request->file('image_id')){
            $name = time() . $image->getClientOriginalName();
            $image->move('images',$name);
            $imageid = Photo::create(['file'=>$name]);
            $input['image_id'] = $imageid->id;
        }

        $user->update($input);



        return  redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::FindOrFail($id);
        if($user->image_id != 0)
        unlink(public_path() . $user->photo->file);
        $user->post()->delete();
        unlink(public_path() .  $user->post->file);
        $user->delete();
        Session::flash('delete_user','This User Has Been Deleted');

        return  redirect('admin/user');
    }
}

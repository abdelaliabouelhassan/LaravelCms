<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AdminPostCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $post = Post::paginate(1);

        return view('admin.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::pluck('name','id')->all();
        return view('admin.post.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

                $input = $request->all();
                $user = Auth::user();
                if($file = $request->file('photo_id')){

                    $name = time() . $file->getClientOriginalName();

                    $file->move('images',$name);

                    $photo = Photo::create(['file'=>$name]);
                    $input['photo_id'] = $photo->id;
                }

                $user->post()->create($input);

        return redirect('admin/post');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::FindOrFail($id);
        $cat = Category::pluck('name','id')->all();

        return view('admin.post.edit',compact('post','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
          $input = $request->all();

         if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }else{
             $input = $request->except('photo_id');
         }

           $post->update($input);
        Session::flash('updatePost','The Post Has Been Updated Successful');
       return  redirect('admin/post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . $post->photo->file);
        Session::flash('deletePost','This Post Has Been Deleted');

        $post->delete();
       return redirect('admin/post');
    }

    public  function post($id){
        $post = Post::findOrFail($id);
        $comment = Comment::all()->where('post_id','=',$id);
        return view('post',compact('post','comment'));
    }

}

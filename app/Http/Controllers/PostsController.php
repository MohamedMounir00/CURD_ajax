<?php

namespace App\Http\Controllers;
use App\Posts;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //

 public function index(){
      $post = Posts::paginate(4);
      return view('posts.index',compact('post'));
    }
public function addPost(Request $request){
      $rules = array(
        'title' => 'required',
        'body' => 'required',
      );
    $validator = Validator::make ( Input::all(), $rules);
    if ($validator->fails())
    return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
else{

 return response::json(Posts::create($request->all()));

}

}

public function editPost(Request $request)
{
    			return response::json(Posts::updateOrCreate(['id'=>$request->id],$request->all()));
    }

    public function deletePost(request $request){
  $post = Posts::find ($request->id)->delete();
  return response()->json();
}
}

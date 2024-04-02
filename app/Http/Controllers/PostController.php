<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Validator;
use DB;
use Storage;
use url;


class PostController extends Controller
{

   function loadMorePost(Request $request)
   {

        $data=DB::table('posts')->orderBy('id','asc')->paginate(6);
        return response($data,200);
     
   }
    
   function countPost(Request $request)
   {
    // HOMEWORK
   }

    function getPosts(Request $request)
    {
    	$query=$request->get('query');

    	$data=DB::table('posts');

    	if (!is_null($query)) {
    		
    		$posts=$data->where('title','like','%'.$query.'%');

    		return response($posts->paginate(7),200);
    	}

    	return response($data->paginate(7),200);
    }

    function store(Request $request)
    {
    	$fields=$request->all();

    	$errors=Validator::make($fields,[
    		'title'=>'required',
    		'post_content'=>'required'
    	]);

    	if ($errors->fails()) {
    		return response($errors->errors()->all(),422);
    	}

       

    	$post=Post::create([
    		'title'=>$fields['title'],
    		'post_content'=>$fields['post_content'],
        'slug'=>$this->generateSlug($fields['title'])
    	]);

    	return response(['message'=>'post created !'],201);
    }

    function generateSlug($title)
    {
       $randomNumber = Str::random(6) . time();
       $slug=Str::slug($title).'-'.$randomNumber;
       return $slug;
    }

    function update(Request $request,$id)
    {
    	Post::where('id',$id)->update([
    		'title'=>$request->title,
    		'post_content'=>$request->post_content,
        'slug'=>$this->generateSlug($request->title)
    	]);

    	return response(['message'=>'post updated !'],200);
    }

    function destroy(Request $request,$id)
    {
    	Post::where('id',$id)->delete();

    	return response(['message'=>'post deleted !'],200);
    }

    function getPostBySlug($slug)
    {
      $posts=Post::where('slug',$slug)->get();
      if (count($posts)) {
        return response($posts,200);
      }else{
        return response($posts,200);

      }

      
    }

   
   function addImage(Request $request)
   {
   		$fields=$request->all();

   		$errors=Validator::make($fields,[
   			'postId'=>'required',
   			'image'=>'required|image|max:2000'
   		]);

   		if ($errors->fails()) {
   			return response($errors->errors()->all(),422);
   		}

   		if ($request->hasFile('image')) {
   			
   			$image=$request->file('image');

   			$input['file']=time().'.'.$image->getClientOriginalExtension();

   			 Storage::disk('public')
            ->put('images/' . $input['file'], file_get_contents($image));

         $imageURL= url('/').'/storage/images/'.$input['file'];


         Post::where('id',$request->postId)
         ->update([
         	'image'=>$imageURL
         ]);
         return response(['message'=>'post image uploaded !'],200);


   		}
   }
   

}
 
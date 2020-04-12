<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function addcomment(Request $request){
        $comment= new Comment;
        $comment->product_id=$request->product_id;
        $comment->customer_name=$request->customer_name;
        $comment->comment=$request->comment;
        $comment->save();

        return Redirect::back();
    }


}

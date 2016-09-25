<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;
use App\Article;

use Session;

class CommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        $add = new Comment();
        $add->article_id = $request->input_article_id;
        $add->user_id = $request->input_user_id;
        $add->content = $request->input_content;
        $add->save();

        Session::flash('message','your comment success to post');
        return redirect('comment-show/'.$request->input_article_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $articles = Article::find($id);
        $comments = Article::find($id)->comments;
        return view('comment.comment_show')
        ->with('list_comment',$comments)
        ->with('list_article',$articles);

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

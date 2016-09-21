<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ArticleRequest;

use App\Http\Requests;

use App\Article;

use App\Comment;   

use Session,Image,File,Validator;

class ArticlesController extends Controller
{
    // page to show all article
    public function index()
    {
     $articles = Article::all();
     return view('article.article_index')->with('list_article',$articles);
    }

    /**
    page redirect to form input new article
     */
    public function create()
    {   
     return view('article.article_create');
    }

    /**
    function proccess save article
     */
    public function store(Request $request)
    {

        $file = $request->file('image');
        $image = Image::make($file);
        $image_location = public_path().'/image_upload/';

        $image->save($image_location.$file->getClientOriginalName());
        $image->resize(200,100);
        $image->save($image_location.'thumb'.$file->getClientOriginalName());

        $add = new Article();
        $add->user_id = $request->input_user_id;
        $add->title_image = $request->input_title_image;
        $add->description_image = $request->input_description_image;
        $add->image = $file->getClientOriginalName();
        
        $add->save();

        Session::flash('message',$request->input_user_id.' your photo success to post');
        return redirect('article-index');
        }

    /**
    page for show detail article
     */
    public function show($id)
    {
        $articles = Article::find($id);
        $comments = Comment::all();
        return view('article.article_show')
        ->with('list_article',$articles)
        ->with('list_comment',$comments);
    }

    /**
    page for view form edit article
     */
    public function edit($id)
    {
        $articles = Article::find($id);
        return view('article.article_edit')->with('list_article',$articles);
    }

    /**
    function for proccess edit article
     */
    public function update(ArticleRequest $request, $id)
    {   

        $articles = Article::find($id);
        $file = $request->file('image');
        $image_location = public_path().'/image_upload/';
        $deletefile = File::delete('image_upload/'.$articles->image);
        
        $image = Image::make($file);
        $image->resize(200,100);
        $image->save($image_location.'thumb'.$file->getClientOriginalName());
        
        if ($request->file('image')->isValid()) {
           $request->file('image')->move($image_location,$file->getClientOriginalName());        
        }else{
           echo "<script>alert('Failed');</script>";
           die();
           return back();

        }

        $articles->id = $request->input_id;
        $articles->user_id = $request->input_user_id;
        $articles->title_image = $request->input_title_image;
        $articles->description_image = $request->input_description_image;
        $articles->image = $file->getClientOriginalName();
        
        $articles->save();

        Session::flash('message',$request->name.' your photo success to update');
        return redirect('article-index');
    }

    /**
        function for delete article
     */
    public function destroy($id)
    {

        $articles = Article::find($id);
        $delete_file = File::delete(['image_upload/'.$articles->image,'image_upload/thumb'.$articles->image, ]);
        $articles->delete();
        Session::flash('message',$articles->name.' your photo success to delete');
        return redirect('article-index');
    }
}

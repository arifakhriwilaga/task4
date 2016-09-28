<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Activations\EloquentActivation;
use Cartalyst\Sentinel\Users\UserInterface;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\User;
use App\Article;

use Redirect,Session;


class AuthenticationsController extends Controller
{
    /**
     return view to sign_up page or first page
     */
    public function sign_up()
    {
        return view('authentication.sign_up');
    }

        /**
     return view to sign_up page or first page
     */

      public function home(Request $request)

      {

        $articles = Article::paginate(2);//->toJson();

        // if ($request::ajax()) {

        //     if($request->keywords) {
        //     $articles = Article::where('title_image', 'like', '%'.$request->keywords.'%')
        //       ->orWhere('description_image', 'like', '%'.$request->keywords.'%')
        //       ->paginate(2);
        //     }

        // $view = (String)view('image.content_image')
        // ->with('list_article', $articles)
        // ->render();
        //  return response()->json(['page' => $view])->render();
        
        // } else {
        
        // $articles = Article::paginate(2);
        // return view('index')
        // ->with('list_article', $articles);
        
        // }

        // if($request->ajax()) {
        //     $articles = Article::orderBy('id', $request->direction)->paginate(2);
        //     $request->direction == 'asc' ? $direction = 'desc' : $direction = 'asc';
        //     $view = (String)view('image.content_image')
        //     ->with('list_article', $articles)
        //     ->render();
        //     return response()->json(['view' => $view, 'direction' => $direction]);
        // } else {
        //     $articles = Article::orderBy('created_at', 'desc')->paginate(2);
        // }
            return view('index')->with('list_article', $articles);
      }

    /**
     return view to index of website
     */
    public function login()
    {
        return view('authentication.login');
    }

    /**
     function for save new user and return view index user page
     */
    public function sign_up_store(UserRequest $request)
    {

        Sentinel::registerAndActivate($request->all());    
        // $request->merge(['umur' => '18', ])
      
        Session::flash('message',' success to register');
        return Redirect('user/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logged_in(Request $request)
    {
        $credentials = [
            'username'  => $request->email,
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if ($user = Sentinel::authenticate($credentials))
        {
            $articles = Article::all();
            return redirect('home')->with('user',$credentials);         
        }
        else{
            Session::flash('notice',' Failed login');
            return redirect('user/login');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Sentinel::logout();
        return redirect('user/login');
    }

    public function search()
    {
        $articles = Article::all();
        return view('student-table')->with('results',$articles);
    }

}

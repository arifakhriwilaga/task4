<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Activations\EloquentActivation;
use Cartalyst\Sentinel\Users\UserInterface;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        $articles = Article::paginate(1);
  
        if ($request->ajax()) {
            return view('image.content_image')->with('list_article',$articles);
        }
            return view('image.content_image')->with('list_article',$articles);
    
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
     return view to index of website
     */
    public function forgot_password()
    {
        return view('authentication.forgot_password');
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
            'username' => $request->email,
            'email'    => $request->email,
            'password' => $request->password,
        ];

        // $user = Sentinel::findUserById(1);
        // Sentinel::check();
        if ($user = Sentinel::authenticate($credentials))
        {
            $articles = Article::all();
            return redirect('index')->with('user',$credentials);         
        }
        else{
            Session::flash('error',' Failed login');
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

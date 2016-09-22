<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\User;
use App\Article;

use Redirect,Sentinel,Session;

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
        // $users = Authentication::create([
        // 'username' => $request->input_username,
        // 'email' => $request->input_email,
        // 'password' => $request->input_password
        // ]);
        Sentinel::registerAndActivate([
            'email' => $request->input_email,
            'password' => $request->input_password,
            
        ]);    

        Session::flash('message',$request->input_username.' success to register');
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
    public function logged_in(UserRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        Sentinel::authenticate($credentials);  

        $articles = Article::all();
         return redirect('article-index')->with('list_article',$articles);

        // $credentials = [
        //     'email'    => $request->email,
        //     'password' => $request->password
        // ];

        // if ($user = Sentinel::stateless($credentials)){
        //        return view('article.article_index');
        // }
        // else{
        //     echo "Error Login";
        // }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

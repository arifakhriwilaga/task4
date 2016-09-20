<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Redirect;

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
    public function sign_up_store()
    {
        $users = Authentication::create([
        'username' => $request->input_username,
        'email' => $request->input_email
        'password' => $request->input_password
        

        ]);


        Session::flash('message',$request->input_name.' success to register');
        return redirect('authentication.login');
    }

    /**
     return view to index of website
     */
    public function forgot_password()
    {
        return view('authentication.login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

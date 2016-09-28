<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Order;

use App\Mail\OrderShipped;

use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use App\User;
use Validator,Session,Redirect,Hash;
    
class ForgotPasswordsController extends Controller


{
    public function change_password($forgot_token)
    {
        $find_user = User::where('forgot_token', $forgot_token)->first();

        if(empty($find_user)) {
          Session::flash('error', 'Token not valid, :)');
            return Redirect::to('user-login');

        } else {

        return view('authentication.change_password')
        ->with( 'forgot_token', $find_user->forgot_token)->with('email',$find_user->email);

        }
    }

    public function change_password_store(Request $request, $forgot_token)
    {
        $valid = array(

        'password' => ('required|min: 8|confirmed')

        );

        $data = $request->all();
    
        $validate = Validator::make($data, $valid);
        $find_data = User::where('forgot_token', $forgot_token)->first();

        if($validate->fails()) {

          return Redirect::to('change-password/'.$find_data->forgot_token)

            ->withErrors($validate)->withInput();

        } else {

          $find_data->password = Hash::make($request->password);

          $find_data->forgot_token = null;

          $find_data->save();

          Session::flash('notice ', 'Hai ' . $find_data->username . ' Password has change lets login');

          return Redirect::to('user/login');

        }
        
    }

    public function reset_password()
    {
        return view('authentication.forgot_password');
    }

    public function reset_password_store(Request $request)
    {

        $valid = array(

          'email' => 'required|email'

        );

    $data = $request->all();

    $validate = Validator::make($data, $valid);

    $find_data = User::where('email', $request->email)->first();

    if($validate->fails()) {

      return Redirect::to('reset-password')

      ->withErrors($validate)

      ->withInput();

    } elseif(empty($find_data)) {

      Session::flash('error', 'Email not found' . $request->email);

      return Redirect::to('reset-password')

        ->withErrors($validate)

        ->withInput();

    } else {

      $find_data->forgot_token = str_random(40);

      $find_data->save();

  Mail::send('authentication.reset_password', $find_data->toArray(), function($message) use($find_data) {
            $message->from('arifakhri97@gmail.com','Admin Ari Blog');
            $message->to($find_data->email)->subject('Reset Password');

      });

    Session::flash('notice', 'Check your email, the reset password instruction has sent to '.$find_data->email);

      return Redirect::to('user/login');

    }


  }



}


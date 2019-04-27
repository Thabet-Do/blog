<?php

namespace App\Http\Controllers;

use App\Jobs\sendEmailJob;
use App\Mail\sendEmail;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;
use Sentinel;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $user = $request->all();


        Sentinel::register($request->all());
        $email = $user['email'];
        $pass = $user['password'];
        $credentials = [
            'email'    => $email,
            'password' => $pass
        ];

        $user = Sentinel::findByCredentials($credentials);

        (new MailController)->basic_email($user);
    }

    public function delete(User $user)
    {
        dd( $user->delete() );
    }

    public function update(Request $request,User $user)
    {
        $user->update($request->all());
        return response($user);
    }

    public function active(User $user)
    {
        $user = Sentinel::findById($user->id);
        $activation = Activation::create($user);
        dd($activation);

    }



    public function user(User $user)
    {
        return response($user);
    }
    public function users()
    {
        $offset = request()->has('offset') ? request()->get('offset') : 0 ;
        $limit = request()->has('limit') ? request()->get('limit') : 10 ;

        $users = DB::table('users')->limit($limit)->offset($offset)->get();
        return response($users);

    }
}
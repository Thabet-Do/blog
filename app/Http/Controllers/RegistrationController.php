<?php

namespace App\Http\Controllers;

use App\Mail\sendEmail;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Sentinel;
//use Swift;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $user = Sentinel::registerAndActivate($request->all());
        $this->sendEmail($request->id);
        dd($user);
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

    public function activate(User $user)
    {
        #open link with specific id
//        return response($user);
    }


    public function sendEmail(User $user)
    {
//        require_once 'autoload.php';
//        require '../../../vendor/autoload.php';


        $id = $user->id;

        $email = $user->email;

        $subject = 'Active Your Account';

        $first_name = $user->first_name;

        $msg = "
        open link below to active your account
        http:/localhost:8000/admin/user/$id/activate";

        $headers = [env('MAIL_USERNAME') => 'Yes Soft'];

        /*
        // Create the Transport
        $transport = (new Swift_SmtpTransport(env('MAIL_USERNAME'), 25))->setUsername(env('MAIL_USERNAME'))->setPassword(env('MAIL_PASSWORD'));
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
        // Create a message
        $message = (new Swift_Message($subject))->setFrom($headers)->setTo([$email => $first_name])->setBody($msg);
        // Send the message
        $result = $mailer->send($message);
        */
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
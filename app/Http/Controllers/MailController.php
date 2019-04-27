<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

    public function basic_email($request) {
        $id = $request->id;
        $email = $request->email;
        $subject = 'Active Your Account In Yes Soft';
        $first_name = $request->first_name;

        $data = array('name'=>$first_name,'id'=>$id);

        Mail::send('mail', $data, function($message) use($email , $subject, $first_name) {
            $message
                ->subject($subject)
                ->from('yes.soft@gmail.com','Yes Soft')
                ->to($email, $first_name);
        });
        echo "Activate Email Sent. Check your inbox.";
    }
}
/*class MailController extends Controller {
    public function send_active_email() {
//        $id = $user->id;

//        $first_name = $user->first_name;

        $data = array('name'=>'$first_name','id'=> 4);

        Mail::send(['text'=>'mail'], $data, function($message) {
//            $first_name = $user->first_name;
//            $email = $user->email;
            $subject = 'Active Your Account';


            $message->from(env('MAIL_USERNAME') , 'Yes Soft');
            $message->to('$email', '$first_name')->subject($subject);
        });
        echo "Activate Email Sent. Check your inbox.";
    }
}*/
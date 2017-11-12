<?php

namespace App\Http\Controllers;

use App\Events\SendMailFromContactEvent;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    /**
     * @param Request $request
     */
    public function contactMail(Request $request)
    {
//        define('MY_EMAIL', 'aleksandr.chasovnikov@gmail.com');
//
//        $receiver = MY_EMAIL;
//
//        $email = trim($_POST['email']);
//        $message = trim($_POST['message']);
//        $text = "Email: $email \r\nMessage: $message";
//        $title = 'Новая заявка';
//
//        mail($receiver, $title, $text, "Content-type: text/plain; charset=\"utf-8\"\r\nFrom: $receiver");
//


        $userEmail = $request->input('email');
        $message = $request->input('message');

        event(new SendMailFromContactEvent($userEmail, $message));

        return view('contact')->with(['success' => 'Сообщение отправлено!']);
    }

}

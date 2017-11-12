<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends BaseController
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMail(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'required|string|min:10|max:1000',
        ]);

        $text = 'Сообщение из '
            . config('app.name')
            . '. От пользователя: '
            . $request->input('email')
            . ': '
            . $request->input('message');
        
        $c = Mail::raw($text, function ($message) {
//            $message->to(config('app.admin_email'));
        });
        
        echo '<pre style="background: #0d6aad;color: #ffffff;">';
        var_dump($c);
        die('<pre>');

        return redirect()->back()->with(['success' => 'Сообщение отправлено!']);
    }

}

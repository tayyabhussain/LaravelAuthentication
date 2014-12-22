<?php

class HomeController extends BaseController
{

    public function showHome()
    {

//        Mail::send('emails.auth.mailbody', array('name' => 'Tayyab'), function($msg) {
//            $msg->to('jamshad.ahmad@coeus-solutions.de')
//                    ->subject('test mail');
//        }
//        );

        return View::make('home');
    }

}

<?php

namespace App\Mailer;

class SendMail{

    private $to;

    private $subject;

    private $message;

    function __construct($to,$subject,$message)
    {
        $this->to = $to;

        $this->subject = $subject;
        
        $this->message = $message;

    }

    function sendMail(){
        $email = \Config\Services::email();

        $email->setFrom('no-reply@viruchith.com','CSE Library Admin');
        $email->setTo($this->to);

        $email->setSubject($this->subject);
        $email->setMessage($this->message);

        if($email->send()){
            return true;
        }else{
            return false;
        }

    }
}
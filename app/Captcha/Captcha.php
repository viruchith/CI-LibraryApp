<?php

namespace App\Captcha;

use \Gregwar\Captcha\CaptchaBuilder;

class Captcha{
    
    private $builder;
    
    function __construct()
    {
        $this->builder = new CaptchaBuilder();
    }

    function generateCaptcha(){
        // build captcha
        $this->builder->build();
        // store it in session
        session()->set("captcha", $this->builder->getPhrase());
        //return inline data @string
        return $this->builder->inline(100);//quality = 100
    }

    function verifyCaptcha($user_phrase){
        $captcha = session()->get('captcha');
        if (strcmp($user_phrase,$captcha) === 0 ) {
            return true;
        }else{
            return false;
        }
    }
}
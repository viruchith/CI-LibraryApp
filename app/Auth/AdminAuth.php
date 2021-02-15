<?php

namespace App\Auth;

use App\Models\AdminModel;

use App\RedisCache\CacheToken;

use App\Captcha\Captcha;

class AdminAuth
{
    private $admin_model;

    function __construct()
    {
        $this->admin_model = new AdminModel();
    }

    public function isAuthenticated()
    {
        if (session()->get('logged_in') === true) {
            return true ;
        } else {
            return false ;
        }
        
    }

    public function isSuperAdmin()
    {
        if (session()->get('is_superadmin') == true) {
            return true;
        } else {
            return false;
        }
    }



    public function authenticateAdmin(string $str, string $fields, array $data){
        $admin = $this->admin_model->fetchAdmin(["email"=>$data['email']]);
        if(!$admin){
            return false;
        }else{
            if(password_verify($data['password'], $admin['password'])){
                unset($admin['password']);
                $admin['logged_in'] = true ;
                session()->set($admin);
                
                return true ;
            
            }else{
                return false ;
            }
        }
    }

    public function validatePassword(string $str, string $fields, array $data)
    {
        $admin = $this->admin_model->fetchAdmin(["email" =>session()->get('email')]);
        if (!$admin) {
            return false;
        } else {
            return password_verify($data['password'], $admin['password']);
        }
    }

    public function validateEmail(string $str, string $fields, array $data)
    {
        $admin = $this->admin_model->fetchAdmin(["email" =>$data['email'] ]);
        if (!$admin) {
            return false;
        } else {
            return true;
        }
    }

    public function unique_email(string $str, string $fields, array $data)
    {
        $admin = $this->admin_model->fetchAdmin(["email" => $data['email']]);
        if ($admin) {
            return false;
        } else {
            return true;
        }
    } 

    public function verifyAdminPin(string $str, string $fields, array $data)
    {
        $admin = $this->admin_model->fetchAdmin(["email" =>session()->get('email')]);
        if (password_verify($data['pin'],$admin['pin'])) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyResetToken($q,$a){
        
        $cache_token = new CacheToken();
        if($cache_token->tokenExists("cse:library:admin:passwordreset:".$q) == 1 ){
            $admin = json_decode($cache_token->getToken("cse:library:admin:passwordreset:".$q),true);
            if(hash('sha384', $admin['secret']) === $a ){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function verifyCaptcha(string $str, string $fields, array $data){
        $captcha = new Captcha();
        return $captcha->verifyCaptcha($data['captcha']);
    }
}

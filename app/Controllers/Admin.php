<?php

namespace App\Controllers;

use App\Auth\AdminAuth;

use App\Models\AdminModel;

use App\Models\BookModel;

use App\Models\EntryModel;

use App\RedisCache\CacheToken;

use App\Mailer\SendMail;

use App\Captcha\Captcha;

class Admin extends BaseController
{
    private $admin_auth;
    
    private $admin_model;

    private $cache_token;


    function __construct()
    {
        $this->admin_auth = new AdminAuth();
        $this->admin_model = new AdminModel();
        $this->cache_token = new CacheToken();
      
    }
    
    public function index()
    {
        // Admin Login

        helper('form');

        if($this->admin_auth->isAuthenticated()){
            return redirect()->to('/admin/dashboard');
        }else{
        
        $data = array();
        
        if($this->request->getMethod(TRUE)=='POST'){
                $rules = [
                    'email' => 'required|min_length[6]|max_length[50]|valid_email|validateEmail[email]',
                    'password' => 'required|min_length[8]|max_length[100]|authenticateAdmin[email,password]',
                    "captcha" => "required|min_length[2]|max_length[50]|verifyCaptcha[captcha]"
                ];

                $errors = [
                    'email'=>[
                        'validateEmail'=>'Account Does not Exist !'
                    ],
                    'password' => [
                        'authenticateAdmin' => 'Email or Password is incorrect !'
                    ],
                    "captcha" => [
                        "verifyCaptcha" => "Invalid Captcha !"
                    ]
                ];

                $throttler = \Config\Services::throttler();
                $allowed = $throttler->check('login', 2, MINUTE);
                if ($allowed) {

                    if (!$this->validate($rules, $errors)) {
                        $data['validation'] = $this->validator;
                    } else {
                        return redirect()->to('/admin/dashboard');
                    }

        }else{
            return "Try again after few minutes !";
        }
    }
            //generate and add captcha
            $captcha = new Captcha();

            $data['captcha'] = $captcha->generateCaptcha();

            return view('admin/login',$data);    

    }
    }


    public function dashboard(){
        if ($this->admin_auth->isAuthenticated()) {
            $book_model = new BookModel();
            $data = [
                'books_total_count'=>$book_model->fetchAllBooksCount() ?? '0',
                'books_titles_count'=>$book_model->fetchAllTitlesCount() ?? '0',
                'books_issued_count'=>$book_model->fetchIssuedBooksCount() ?? '0'
            ];

            if(strcmp($this->request->getGet('data'),'titles') === 0){
                return $this->response->setStatusCode(200)->setJSON(json_encode(['titles'=>$book_model->fetchTopTenTitles()]));
            }

            if(strcmp($this->request->getGet('data'),'issued') === 0){
                
                $entry_model = new EntryModel();

                return $this->response->setStatusCode(200)->setJSON(json_encode(['titles' => $entry_model->fetchTopTenIssuedTitles()]));
            }

            return view("admin/dashboard",$data);
        } else {
            return redirect()->to('/admin');
        }
        
    }

    public function changepassword(){
        //Admin ChangePassword
        $data=array();
        helper('form');
        
        if($this->admin_auth->isAuthenticated()){
            if ($this->request->getMethod(TRUE) == 'POST') {
                $throttler = \Config\Services::throttler();
                $allowed = $throttler->check('changepassword', 5, MINUTE);
                if ($allowed) {
                    $rules = [
                        'password' => 'required|min_length[8]|max_length[100]|string|validatePassword[password]',
                        'newpassword' => 'required|min_length[8]|max_length[100]|string|matches[retypepassword]',
                        'retypepassword' => 'required|min_length[8]|max_length[100]|string|matches[newpassword]',

                    ];

                    $errors = [
                        'password' => [
                            'validatePassword' => 'Incorrect current Password !'
                        ],
                    ];

                    // validate
                    if (!$this->validate($rules, $errors)) {
                        $data['success'] = false ;
                        $data['errors'] = $this->validator->getErrors();
                    } else {
                        $new_password  = $this->request->getPost('newpassword');
                        //chagne password
                        $this->admin_model->changePassword(session()->get('email'),password_hash($new_password,PASSWORD_DEFAULT));
                        $data['success'] = true;
                        $data['msg'] = "Password Changed Successfully !";
                    }
                    return $this->response->setStatusCode(200)->setJSON(json_encode($data));

                } else {
                    return "Try again after few minutes !";
                }
                
            }
            return "";
        }else{
            return redirect()->to('/admin');
        }
    }

    public function forgotPassword(){
        # if not authenticated
        helper('form');
        if(!$this->admin_auth->isAuthenticated()){
            $data = [];
            if($this->request->getMethod(TRUE)=='POST'){
                $throttler = \Config\Services::throttler();
                $allowed = $throttler->check('forgotpassword', 3, MINUTE);
                
                if($allowed){
                    $rules=[
                        "email"=>"required|max_length[100]|valid_email|validateEmail[email]",
                        "captcha"=>"required|min_length[2]|max_length[50]|verifyCaptcha[captcha]"
                    ];
                    $errors = [
                    'email'=>[
                        'validateEmail'=>'Account Does not Exist !'
                    ],
                    "captcha"=>[
                        "verifyCaptcha"=>"Invalid Captcha !"
                    ]
                    
                    ];
                    // validate
                    if (!$this->validate($rules,$errors)) {
                        $data['validation'] = $this->validator;
                    } else {
                        //Recovery procedure
                        $to_email = $this->request->getPost('email');
                        
                        $secret = bin2hex(random_bytes(32));

                        $q=hash('sha256',$to_email);// Email is SHA-256
                        
                        $a=hash('sha384',$secret);//Secret is SHA-384

                        $admin_user = $this->admin_model->fetchAdminInfo(['email'=>$to_email]);
                        $admin_user['secret'] = $secret;

                        $message = "
                        Use the URL link to reset your password.\n
                        ".base_url()."/admin/resetpassword?q=".$q."&a=".$a;

                        $this->cache_token->setToken("cse:library:admin:passwordreset:".$q,json_encode($admin_user),900);

                        $mailer = new SendMail($to_email,"Password Reset",$message);
                        if($mailer->sendMail()){
                            return "<h1>Password Reset link has been sent to your Inbox !</h1>";
                        }else{
                            return "<h1>Failed to Send Mail !</h1>";
                        }
                        
                    }
                }else{
                    
                    return "Please Try again after few Minutes !";
                }  
            }
            //generate and add captcha
            $captcha = new Captcha();

            $data['captcha'] = $captcha->generateCaptcha();

            return view('admin/forgot_password',$data);
        }else{
            return redirect()->to('/admin/dashboard');
        }
    }



    public function resetPassword(){
        helper('form');
        $data=[];
        if (!$this->admin_auth->isAuthenticated()) {
            if($q = $this->request->getGet('q') && $a = $this->request->getGet('a') ){
                $data["q"] = $this->request->getGet('q');
                $data["a"] = $this->request->getGet('a');
                if($this->admin_auth->verifyResetToken($this->request->getGet('q'), $this->request->getGet('a'))){
                        if( $this->request->getMethod(TRUE) == 'POST' ){
                        //Password to be Validated and Updated

                        $rules = [
                            'password' => 'required|min_length[8]|max_length[100]|string|matches[retypepassword]',
                            'retypepassword' => 'required|min_length[8]|max_length[100]|string|matches[password]',

                        ];

                        $errors = [
                            'password' => [
                                'matches' => ' Passwords Donot Match !'
                            ],
                            'retypepassword' => [
                                'matches' => ' Passwords Donot Match !'
                            ],
                        ];

                        // validate
                        if (!$this->validate($rules, $errors)) {
                            $data['validation'] = $this->validator;
                        } else {
                            //update password
                            
                            $admin = json_decode($this->cache_token->getToken("cse:library:admin:passwordreset:".$this->request->getGet('q')),true);
                            $password_hash = password_hash($this->request->getPost('password'),PASSWORD_DEFAULT);
                            $this->admin_model->changePassword($admin["email"],$password_hash);
                            $this->cache_token->deleteToken("cse:library:admin:passwordreset:".$this->request->getGet('q'));
                            return "<h1>Password Changed Successfully !</h1>";
                        }

                        }


                    return view('/admin/reset_password',$data);
                }else{
                    return "<h1>Invalid or Expired Token !</h1>";
                }
            }else{
                return "<h1>Invalid Request !</h1>";
            }
        }else{
            return redirect()->to('/admin/dashboard');
        }
    }

    public function changePin(){
        if($this->admin_auth->isAuthenticated()){
            if($this->request->isAJAX() and $this->request->getMethod(true) === 'POST' ){
                $rules = [
                    'pin' =>"required|numeric|exact_length[4]",
                    'password'=> "required|min_length[8]|max_length[100]|validatePassword[password]"
                ];

                $errors = [
                    'password'=>[
                        'validatePassword'=>'Invalid current Password !'
                        ]
                    ];

                    if(!$this->validate($rules,$errors)){
                        $data['success'] = false;
                        $data['errors'] = $this->validator->getErrors();
                    }else{
                        $new_pin = $this->request->getPost('pin') ;

                        $this->admin_model->changePin('',$new_pin);

                        $data['success'] = true ;
                        $data['msg'] = "Pin updated successfully !";
                    }

                    return $this->response->setStatusCode(200)->setJSON(json_encode($data));
            }
        }else{
            return redirect()->to('/admin');
        }
    }

    public function add(){
        if ($this->admin_auth->isAuthenticated() && $this->admin_auth->isSuperAdmin()) {
            if($this->request->getMethod(true) === 'POST'){
                $rules=[
                    'name'=>'required|string|min_length[2]|max_length[250]',
                    'email'=>'required|valid_email|unique_email[email]|max_length[250]',
                    'mobile'=>'required|numeric|exact_length[10]',
                    'pin'=>'required|numeric|exact_length[4]',
                    'password'=>'required|min_length[8]|max_length[200]|matches[retypepassword]',
                    'retypepassword' => 'required|min_length[8]|max_length[200]|matches[password]',

                ];

                $errors = [
                    'email'=>[
                        'unique_email'=>'Email is already under use !'
                    ]
                ];

                if(!$this->validate($rules,$errors)){
                    $data['success'] = false;
                    $data['errors'] = $this->validator->getErrors(); 
                }else{
                    $details = array(
                        'name'=>$this->request->getPost('name'),
                        'email'=>$this->request->getPost('email'),
                        'mobile'=>$this->request->getPost('mobile'),
                        'pin'=>$this->request->getPost('pin'),
                        'password'=>$this->request->getPost('password')
                    );

                    $this->admin_model->createAdmin($details);
                    $data['success'] = true;
                    $data['msg'] = "User added Successfully !";
                }

                return $this->response->setStatusCode(200)->setJSON(json_encode($data));
            }
            return view('admin/add_admin');

        } else {
            return redirect()->to('/admin');
        }
        
    }

    public function delete(){
        if($this->admin_auth->isAuthenticated() && $this->admin_auth->isSuperAdmin()){
            if($this->request->getMethod(true)==='POST'){
                $rules=[
                    'email'=>'validateEmail[email]|isNotSuperAdmin[email]'
                ];

                $errors = [
                    'email'=>[
                        'validateEmail'=>'Email does not exist !',
                        'isNotSuperAdmin'=>'You cannot delete a Super Admin !'
                    ],

                ];

                if(!$this->validate($rules,$errors)){
                    // Delete Admin
                    $data['success'] = false ;
                    $data['errors'] = $this->validator->getErrors();
                }else{
                    $email = $this->request->getPost('email');
                    $this->admin_model->deleteAdmin($email);
                    $data['success'] = true;
                    $data['msg'] = "User deleted successfully !";
                }
                return $this->response->setStatusCode(200)->setJSON(json_encode($data));
            }
        }
    }

    public function users($user='all'){
        if ($this->admin_auth->isAuthenticated() && $this->admin_auth->isSuperAdmin()) {
            $data = array();
            if(strcmp($user,'all')===0){
                $users = $this->admin_model->fetchAllUsersInfo();
                $data['users'] = $users ;
                $data['success'] = true ;
                return $this->response->setStatusCode(200)->setJSON(json_encode($data));
            }
        } else {
            return redirect()->to('/admin');
        }
        
    }

    public function account(){
        if($this->admin_auth->isAuthenticated()){
            $data = array();
            
            $data = $this->admin_model->fetchAdminInfo(['email'=>session()->get('email')]);

            if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST' ) {
                $rules = [
                    "name"=> "required|alpha_numeric_punct|max_length[100]",
                    "email"=>"required|valid_email",
                    "mobile"=>"required|numeric|exact_length[10]"
                ];

                $errors = [];

                if (!$this->validate($rules,$errors)) {
                    $data['success'] = false ;
                    $data['errors'] = $this->validator->getErrors();
                } else {
                    $email = $this->request->getPost('email');
                    $name = $this->request->getPost('name');
                    $mobile = $this->request->getPost('mobile');

                    $this->admin_model->updateDetails($email,$name,$mobile);

                    $data['success'] = true;
                    $data['msg'] = "Details updated success fully !";

                    $data = array_merge($data,['email'=>$email,'name'=>$name,'mobile'=>$mobile]);
                    
                }

                return $this->response->setStatusCode(200)->setJSON(json_encode($data));
                

            }

            return view('admin/account_settings',$data);

        }else{
            return redirect()->to('/admin');
        }

    }


    public function logout(){
        session()->destroy();
        return "<h1>LogOut Successful.....</h1>";
    }
}

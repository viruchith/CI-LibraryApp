<?php

namespace App\Controllers;

use App\Auth\AdminAuth;

use App\RedisCache\CacheToken;

use App\Mailer\SendMail;

use App\Models\EntryModel;

class Verify extends BaseController
{
    private $admin_auth;

    private $cache_token;

    function __construct()
    {
        $this->admin_auth = new AdminAuth();
        $this->cache_token = new CacheToken();
    }

    private function generateOTP()
    {
        $otp = '' . random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9);
        return $otp;
    }

    private function reSendIssueOTP($data){
        $otp = $this->generateOTP();
        $data['otp'] = hash('sha384',$otp) ;
        $data['otp_time'] = (time()+(5*60)+5);

        $this->cache_token->setToken('cse:library:issue:'.$data['issue_id'],json_encode($data),'305');
        
        $mailer = new SendMail($data['member_email'], 'Book Issue OTP', 'To obtain your new book use the OTP: ' . $otp . '.');
        $mailer->sendMail();

        return $data;
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function issue($issue_id='false'){
        if ($this->admin_auth->isAuthenticated()) {
            if (!empty($issue_id)) {
                if ($this->cache_token->tokenExists('cse:library:issue:' . $issue_id)) {

                    $entry_model = new EntryModel();

                    $data = json_decode($this->cache_token->getToken('cse:library:issue:' . $issue_id), true);

                    if($this->request->getGet('resend')===$issue_id){
                        $data = $this->reSendIssueOTP($data);
                    }
                    // verify via otp
                    if($this->request->getPost('verify-otp')){
                        $rules=[
                            "issue_id"=>"required|exact_length[10]",
                            "otp"=>"required|exact_length[6]|verifyOTP[otp,issue_id]",
                        ];

                        $errors = [
                            "otp"=>[
                                "verifyOTP"=>"Invalid OTP !"
                            ]
                            ];

                        if(!$this->validate($rules,$errors)){
                            $data['validation'] = $this->validator;
                        }else{
                            $data['issue_time'] = date('Y-m-d H:i:s', time());
                            if($entry_model->addEntry($data)){
                                return redirect()->to("/book/issue/".$issue_id);
                            }else{
                                return "ISSUE FAILED !";
                            }

                        }

                    }

                    // verify via  PIN
                    if ($this->request->getPost('verify-pin')) {
                        $rules = [
                            "issue_id" => "required|exact_length[10]",
                            "pin" => "required|exact_length[4]|verifyAdminPin[pin]",
                        ];

                        if (!$this->validate($rules)) {
                            $data['validation'] = $this->validator;
                        } else {
                            if ($entry_model->addEntry($data)) {
                                return "Success, Book Issued !";
                            } else {
                                return "ISSUE FAILED !";
                            }   
                        }
                    }
                    
                    return view('book/verify_issue', $data);

                } else {
                    return "Invalid or Expired Token !";
                }
            } else {
                return "Inavlid Request! Missing URL Parameter!";
            }
        } else {
            return redirect()->to('/admin');
        }
        
        
    }

    public function demo(){
    $entry_model = new EntryModel();
        
    /*$data = [
            "issue_id"=>"IS12345678",
            "book_ref_num"=>"viru1234",
            "book_title"=>"Book title",
            "book_author"=>"Author name",
            "member_id"=>"1919102189",
            "member_name"=>"Viruchith",
            "member_email"=>"vg@gmail.com",
            "member_mobile"=>"8098867773",
            "member_role"=>"student",
            "issue_time"=> date('Y-m-d H:i:s', time())
            ];*/
    //echo $entry_model->addEntry($data);


    }
}

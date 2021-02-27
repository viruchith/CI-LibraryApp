<?php

namespace App\Controllers;

use App\Models\BookModel;

use App\Models\EntryModel;

use App\Auth\AdminAuth;


class Entry extends BaseController
{
    private $admin_auth;
    private $book_model;
    private $entry_model;

    function __construct()
    {
        $this->book_model = new BookModel();
        $this->admin_auth = new AdminAuth();
        $this->entry_model = new EntryModel();
    }


    public function index($issue_id = false)
    {
        if (!empty($issue_id) && $issue_id !== false) {
            if ($this->admin_auth->isAuthenticated()) {
                $entry = $this->entry_model->fetchEntry($issue_id);
                if (!empty($entry)) {
                    return view('entry/entry_detail_1', $entry);
                } else {
                    return "Entry Does not Exist";
                }
            } else {
                return redirect()->to('/admin');
            }
        } else {
            return "Invalid Request! Missing URL Parameter".$issue_id;
        }
    }

    public function get(){
        if($this->admin_auth->isAuthenticated()){
            //paginated entries
            if(strcmp($this->request->getGet('id'),'all-entries') === 0){
                $entries = $this->entry_model->fetchAllEntries();
                if (!empty($entries)) {
                    $data['success'] = true;
                    $data['entries'] = $entries;
                } else {
                    $data['success'] = false;
                }
            }
            else if (strcmp($this->request->getGet('id'), 'pending-entries') === 0) {
                $entries = $this->entry_model->fetchAllPendingEntries();
                if (!empty($entries)) {
                    $data['success'] = true;
                    $data['entries'] = $entries;
                } else {
                    $data['success'] = false;
                }
            } 
            else if (strcmp($this->request->getGet('id'), 'returned-entries') === 0) {
                $entries = $this->entry_model->fetchAllReturnedEntries();
                if (!empty($entries)) {
                    $data['success'] = true;
                    $data['entries'] = $entries;
                } else {
                    $data['success'] = false;
                }
            }

            return $this->response->setStatusCode(200)->setJSON(json_encode($data));

        }else{
            return redirect()->to('/admin');
        }
    }

    public function all(){
        if($this->admin_auth->isAuthenticated()){
            return view('entry/entry_all');
        }else{
            return redirect()->to('/admin');
        }
    }

    public function report(){
        if($this->admin_auth->isAuthenticated()){
            if($this->request->getMethod(true)==='POST'){
                $rules = [
                    'from'=>'required|valid_date',
                    'to' => 'required|valid_date'
                ];

                if(!$this->validate($rules)){
                    $data['success'] = false ;
                    $data['errors'] = $this->validator->getErrors();
                }else{
                    $from = $this->request->getPost('from', FILTER_SANITIZE_STRING);
                    $to = $this->request->getPost('to', FILTER_SANITIZE_STRING);

                    $data['success'] = true ;
                    $data['entries'] = $this->entry_model->fetchEntriesByDate($from,$to);
                }

                return $this->response->setStatusCode(200)->setJSON(json_encode($data));
            }
            return view('entry/entry_report');
        }else{
            return redirect()->to('/admin');
        }
    }

    public function pending($member_id = false){
        if($member_id){
            $data = array();
            $entries = $this->entry_model->fetchPendingEntriesByMemberId($member_id);
            if(!empty($entries)){
                $data['success'] = true;
                $data['entries'] = $entries;
            }else{
                $data['success'] = false;
                $data['msg'] = "No pending entries !"; 
            }
            return $this->response->setStatusCode(200)->setJSON(json_encode($data));

        }else{
            return "Invalid Request ! Missing URL Parameter !";
        }
    }

    
}

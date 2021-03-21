<?php

namespace App\Controllers;

use App\Auth\AdminAuth;

class Batch extends BaseController{

    private $file;

    private $admin_auth;

    function __construct()
    {
        $this->file = file_get_contents(WRITEPATH . '/json/batches.json');
        $this->admin_auth = new AdminAuth();
    }

    public function index(){
        if($this->admin_auth->isAuthenticated()){
            return $this->response->setStatusCode(200)->setJSON($this->file);
        }
    }

    public function add(){
        
        if($this->admin_auth->isAuthenticated()){
            $data = array();
            if($this->request->getMethod(true) === 'POST'){
                $rules = [
                    'batch'=> 'required|alpha_dash'
                ];
                $errors = [
                    'batch'=>[
                        'alpha_dash'=>'Invalid Batch Format !'
                    ]
                ];

                if(!$this->validate($rules,$errors)){
                    $data['success'] = false;
                    $data['msg'] = 'Invalid Batch Value !';
                }else{
                    $batch = $this->request->getPost('batch');
                    $batches = json_decode($this->file,true);
                    if (isset($batches[$batch])) {
                        $data['success'] = false;
                        $data['errors'] = [
                            'batch'=>'Batch Already Exists !'
                        ];
                    }else{
                        $batches = array_merge(array($batch=>$batch),$batches);
                        if(file_put_contents(WRITEPATH . '/json/batches.json',json_encode($batches))){
                            $data['success'] = true;
                            $data['msg'] = "Batch added successfully";
                        }else{
                            $data['success'] = false;
                            $data['errors'] = [
                                "batch"=>"Failed to add batch !"
                            ];
                        }
                    }
                }
                return $this->response->setStatusCode(200)->setJSON(json_encode($data));
            }
        }else{
            return redirect()->to('/admin');
        }
    }

    public function delete(){
        if($this->admin_auth->isAuthenticated()){
            $data = array();
            if($this->request->getMethod(true) === 'POST'){
                $rules = [
                    'batch' => 'required|alpha_dash'
                ];
                $errors = [
                    'batch' => [
                        'alpha_dash' => 'Invalid Batch Format !'
                    ]
                ];

                if(!$this->validate($rules,$errors)){
                    $data['success'] = false;
                    $data['errors'] = $this->validator->getErrors();
                }else{
                    $batch = $this->request->getPost('batch');
                    $batches = json_decode($this->file, true);
                    if(isset($batches[$batch])){
                        unset($batches[$batch]);
                        if (file_put_contents(WRITEPATH . '/json/batches.json', json_encode($batches))) {
                            $data['success'] = true;
                            $data['msg'] = "Batch deleted successfully";
                        } else {
                            $data['success'] = false;
                            $data['errors'] = [
                                "batch" => "Failed to delete batch !"
                            ];
                        }
                    }else{
                        $data['success'] = false;
                        $data['errors'] = [
                            'batch' => 'Batch Does not Exist !'
                        ];

                    }
                }
                return $this->response->setStatusCode(200)->setJSON(json_encode($data));
        }
    }else{
            return redirect()->to('/admin');
    }
}
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'cse_library_admins';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['id','email','password','pin','name','mobile','last_login','is_superadmin'];

    protected $useTimestamps = true;
    // Leave it blank to avoid Exception
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    public function fetchAdmin($condition){
     return $this->asArray()->where($condition)->first();
    }

    public function fetchAdminInfo($condition)
    {
        return $this->select('id,email,name,mobile,last_login,is_superadmin')->where($condition)->first();
    }

    public function changePassword($mail_id,$password_hash){
        return $this->whereIn('email',[$mail_id])->set(["password"=>$password_hash])->update();
    }

    public function changePin($mail_id,$pin){
        return $this->whereIn('email', [$mail_id])->set(["pin" => $pin])->update();
    }

    public function updateDetails($email,$name,$mobile){
        return $this->where(['id'=>session()->get('id')])->set(['email'=>$email,'name'=>$name,'mobile'=>$mobile])->update();
    }

    public function fetchAllUsersInfo(){
        return $this->select('id,email,name,mobile,last_login')->findAll(100);
    }

}

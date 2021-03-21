<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Models\BookModel;

class EntryModel extends Model{

    protected $table = 'cse_library_entries';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['issue_id','book_ref_num','member_id','member_name','member_email','member_mobile','member_role','batch','issue_time','is_returned','return_time'];

    public function addEntry($data){
            $is_student = false;
            if(strcmp($data['member_role'], 'Student') === 0){
                $is_student =true;
            }
            foreach ($data as $key => $value) {
                $data[$key] = $this->escape($data[$key]);
            }

            $this->transBegin();
            $this->query("UPDATE cse_library_books SET status = 'issued', last_issue_id = ".$data['issue_id']." WHERE ref_num = ".$data['book_ref_num']." AND status = 'available' ");
            if($is_student){
                $this->query("INSERT INTO cse_library_entries(issue_id, book_ref_num, book_title, book_author, member_id, member_name, member_email, member_mobile, member_role, batch, issue_time, is_returned) VALUES (" . $data['issue_id'] . "," . $data['book_ref_num'] . "," . $data['book_title'] . "," . $data['book_author'] . "," . $data['member_id'] . ", " . $data['member_name'] . ", " . $data['member_email'] . ", " . $data['member_mobile'] . ", " . $data['member_role'] . ", ".$data['batch'] .", ". $data['issue_time'] . ", 0) ");
            }else{
               $this->query("INSERT INTO cse_library_entries(issue_id, book_ref_num, book_title, book_author, member_id, member_name, member_email, member_mobile, member_role, issue_time,is_returned) VALUES (" . $data['issue_id'] . "," . $data['book_ref_num'] . "," . $data['book_title'] . "," . $data['book_author'] . "," . $data['member_id'] . ", " . $data['member_name'] . ", " . $data['member_email'] . ", " . $data['member_mobile'] . ", " . $data['member_role'] . "," . $data['issue_time'] . ", 0) ");
            }

            if ($this->transStatus() === FALSE) {
                $this->transRollback();
                return false;
            } else {
                $this->transCommit();
                return true;
            }

    }

    public function returnBookEntry($ref_num){

        $return_time = date('Y-m-d H:i:s', time()) ;

        $ref_num = $this->escape($ref_num);
        $book_q =  $this->query("SELECT * FROM cse_library_books WHERE ref_num = ".$ref_num." LIMIT 1  ");
        $book =  $book_q->getRowArray();
        if(strcmp($book['status'],'issued') === 0 ){
            $this->transBegin();
            $this->query("UPDATE cse_library_entries SET is_returned = 1, return_time ='$return_time'  WHERE issue_id = '$book[last_issue_id]' AND book_ref_num = '$book[ref_num]' ");
            $this->query("UPDATE cse_library_books SET status = 'available', last_issue_id = 'NA'   WHERE ref_num = '$book[ref_num]' AND status = 'issued' ");

            if ($this->transStatus() === FALSE) {
                $this->transRollback();
                return false;
            } else {
                $this->transCommit();
                return true;
            }

        }else{
            return false ;
        }
    }


    public function fetchEntry($issue_id){
        return $this->asArray()->where(['issue_id'=>$issue_id])->first();
    }

    public function fetchEntryByRefNum($ref_num){
        $book_model = new BookModel();
        $book = $book_model->fetchBookByRefNum($ref_num);
        if(isset($book)){
            if($book['status'] === 'issued'){
                return $this->asArray()->where(['issue_id'=>$book['last_issue_id'],'book_ref_num'=>$book['ref_num']])->first();
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function fetchAllEntries(){
        return $this->orderBy('issue_time','DESC')->paginate(100);
    }

    public function fetchAllPendingEntries(){
        return $this->orderBy('issue_time', 'DESC')->where(['is_returned'=>false])->paginate(100);
    }

    public function fetchAllReturnedEntries()
    {
        return $this->orderBy('issue_time', 'DESC')->where(['is_returned' => true])->paginate(100);
    }

    public function fetchEntriesByDate($from,$to){
        $from = $this->escape($from);
        $to = $this->escape($to);

        $query = $this->query("SELECT * FROM cse_library_entries WHERE issue_time BETWEEN ".$from." AND ".$to." ORDER BY issue_time DESC LIMIT 400");
        return $query->getResultArray();

    }

    public function fetchPendingEntriesByMemberId(String $member_id){
        return $this->where(['member_id'=>$member_id,'is_returned'=>false])->findAll();
    }

    public function fetchTopTenIssuedTitles(){
        $query = $this->query("SELECT book_title,COUNT(book_title) AS quantity FROM cse_library_entries WHERE 1 GROUP BY book_title ORDER BY quantity DESC LIMIT 10");
        return $query->getResultArray();

    }

    public function fetchEntriesByBatch(String $batch){
        return $this->where(['member_role'=>'Student','batch'=>$batch])->orderBy('issue_time', 'DESC')->findAll(400);
    }

    public function searchEntries(String $m,String $q){
        return $this->orderBy('issue_time','DESC')->orLike([$m=>$q])->findAll(400);
    }
}
<?php

namespace App\Validate;

use App\Models\BookModel;

use App\Models\EntryModel ;

use App\RedisCache\CacheToken;

class BookValidator{
    public function uniqueRefNum(string $str, string $fields, array $data){
        $book_model =new BookModel();

        $book = $book_model->fetchBookByRefNum($data['ref_num']);
        if(empty($book)){
            return true;
        }else{
            return false;
        }
    }

    public function bookExists(string $str, string $fields, array $data)
    {
        $book_model = new BookModel();

        $book = $book_model->fetchBookByRefNum($data['ref_num']);
        if (empty($book)) {
            return false;
        } else {
            return true;
        }
    }

    public function bookAvailable(string $str, string $fields, array $data){
        $book_model = new BookModel();

        $book = $book_model->fetchBookByRefNum($data['ref_num']);

        if(empty($book)){
            return false;
        }else{
            if(strcmp($book['status'],'available') === 0){
                return true;
            }else{
                return false;
            }
        }
    }

    public function bookIssued(string $str, string $fields, array $data)
    {
        $book_model = new BookModel();

        $book = $book_model->fetchBookByRefNum($data['ref_num']);

        if (empty($book)) {
            return false;
        } else {
            if (strcmp($book['status'], 'available') === 0) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function validateRole(string $str, string $fields, array $data){
        if( strcmp('Student',$data['member_role'])===0 || strcmp('Faculty',$data['member_role']) ===0 ){
            return true;
        }else{
            return false;
        }
    }

    public function verifyOTP(string $str, string $fields, array $data)
    {
        $cache_token = new CacheToken();
        $issue_data = json_decode($cache_token->getToken('cse:library:issue:' . $data['issue_id']), true);
        if(!empty($issue_data)){
            if(hash('sha384', $data['otp']) === $issue_data['otp'] ){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function verifyIssueId(string $str, string $fields, array $data){
        $entry_model = new EntryModel() ;
        $entry = $entry_model->fetchEntry($data['issue_id']);
        if(!empty($entry)){
            if($entry['is_returned'] === true){
                return false;
            }else{
                return true;
            }
        }else{
            return false ;
        }
    }
}
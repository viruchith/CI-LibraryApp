<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model{
    protected $table = 'cse_library_books';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['ref_num', 'title', 'author', 'publisher', 'status', 'last_issue_id'];

    public function addBook($ref_num,$title,$author,$publisher){
        return $this->insert([
            "ref_num"=>$ref_num,
            "title"=>$title,
            "author"=>$author,
            "publisher"=>$publisher
        ]);
    }


    public function updateBook($ref_num, $title, $author, $publisher)
    {
        return $this->where(['ref_num'=>$ref_num])->set([
            "title" => $title,
            "author" => $author,
            "publisher" => $publisher
        ])->update();
    }

    public function deleteBook($ref_num){
        return $this->where(['ref_num' =>$ref_num ])->delete();
    }


    public function checkBookAvailability($ref_num){
        $book = $this->where(['ref_num'=>$ref_num])->first();
        if(!empty($book)){
            if(strcmp($book['status'],'available') === 0){
                return $book;
            }else{
                return 'Book is unavailable !';
            }
        }else{
            return 'Book does not exist !';
        }
    }

    public function searchBooks($match,$q,$limit){
        if($limit>200){
            $limit=200;
        }
        if(strcmp($match,'ref_num') === 0){
            return $this->select('ref_num,title,author,publisher,status')->orderBy('ref_num', 'ASC')->orLike(['ref_num' => $q])->findAll($limit);
        }

        if (strcmp($match, 'title') === 0) {
            return $this->select('ref_num,title,author,publisher,status')->orderBy('title', 'ASC')->orLike(['title' => $q])->findAll($limit);
        }
        if (strcmp($match, 'author') === 0) {
            return $this->select('ref_num,title,author,publisher,status')->orderBy('author', 'ASC')->orLike(['author' => $q])->findAll($limit);
        }
        if (strcmp($match, 'publisher') === 0) {
            return $this->select('ref_num,title,author,publisher,status')->orderBy('publisher', 'ASC')->orLike(['publisher' => $q])->findAll($limit);
        }else{
            return $this->select('ref_num,title,author,publisher,status')->orderBy('publisher', 'ASC')->orLike(['publisher' => $q])->findAll($limit);           
        }
    }

    public function fetchBookByRefNum($ref_num){
        return $this->asArray()->where(["ref_num"=>$ref_num])->first();
    }

    public function fetchAllBooksCount(){
        return $this->countAll();
    }

    public function fetchAllTitlesCount(){
        $query = $this->query("SELECT COUNT(DISTINCT(title)) AS count FROM cse_library_books ");
        return $query->getRow()->count;
    }

    public function fetchTopTenTitles(){
        $query = $this->query("SELECT title,COUNT(title) AS quantity FROM cse_library_books WHERE 1 GROUP BY title ORDER BY quantity DESC LIMIT 10 ");
        return $query->getResultArray();
    }

}
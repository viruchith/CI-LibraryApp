<?php namespace App\Controllers;

use App\Models\BookModel;

use App\Models\EntryModel ;

use App\Auth\AdminAuth;

use App\RedisCache\CacheToken;

use App\Mailer\SendMail;

use App\Captcha\Captcha;

class Book extends BaseController
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

	private function generateOTP(){
		$otp = '' . random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9);
		return $otp;
	}

	public function index()
	{
		if($this->admin_auth->isAuthenticated()){
			$data=[
				'books_count'=>$this->book_model->fetchAllBooksCount()
			];

			return view("book/all", $data);	
		}else{
			return redirect()->to('/admin');
		}
	}

	public function all(){
		$books = $this->book_model->select('ref_num,title,author,publisher,status')->orderBy('title','ASC')->paginate(100);
		return $this->response->setStatusCode(200)->setJSON(json_encode($books));
	}

	public function search(){
		helper('form');

		if($this->request->isAJAX()){
			$rules=[
				"q"=>"required|max_length[75]",
				"match"=>"required|string",
				"limit"=>"required|max_length[3]|integer"
			];

			if(!$this->validate($rules)){
				$data=[
					'success'=>false,
					'msg'=>'Invalid Request'
				];
				return $this->response->setStatusCode(200)->setJson(json_encode($data));

			}else{
				$q = $this->request->getPost('q');
				$match = $this->request->getPost('match');
				$limit = $this->request->getPost('limit');
				$books = $this->book_model->searchBooks($match,$q,$limit);

				if(!empty($books)){
					$data=[
						'success'=>true,
						'books'=>$books
					];
					return $this->response->setStatusCode(200)->setJson(json_encode($data));
				}else{
					$data=[
						'success'=>false,
						'msg'=>'No Results found'
					];
					return $this->response->setStatusCode(200)->setJson(json_encode($data));

				}
			}


		}

		return view('book/search_books');
	}

	public function get(){
		if($this->admin_auth->isAuthenticated()){
			$data=array();
			if($this->request->getMethod(true)=='GET' and $ref_num = $this->request->getGet('ref_num')){
				$book = $this->book_model->fetchBookByRefNum($ref_num);
				if(!empty($book)){
					$data['success']=true;
					$data['book']=$book;
					return $this->response->setStatusCode(200)->setJSON(json_encode($data));
				}else{
					$data['success']=false;
					$data['msg']='Could not find the Book !';
					return $this->response->setStatusCode(200)->setJSON(json_encode($data));

				}
			}
		}
	}

	public function add(){
		helper('form');
		if($this->admin_auth->isAuthenticated()){
			$data=array();
			if($this->request->isAJAX()){
				$rules=[
					"ref_num"=> "required|max_length[25]|alpha_dash|uniqueRefNum[ref_num]",
					"title"=>"required|max_length[250]|string",
					"author"=>"required|max_length[250]|string",
					"publisher" => "required|max_length[250]|string",
				];

				$errors=[
					"ref_num"=>[
						"uniqueRefNum"=>"Reference Number already exists !"
					]
				];

				if (!$this->validate($rules, $errors)) {
					$data['success']= false;
					$data['errors'] = $this->validator->getErrors();

					return $this->response->setStatusCode(200)->setJSON(json_encode($data));
				}else{
					$ref_num = $this->request->getPost('ref_num');
					$title = $this->request->getPost('title');
					$author = $this->request->getPost('author');
					$publisher = $this->request->getPost('publisher');

					if($this->book_model->addBook($ref_num,$title,$author,$publisher)){
						$data['success'] = true;
						return $this->response->setStatusCode(200)->setJSON(json_encode($data));
					}else{
						$data['success'] = false;
						$data['errors']=['error'=>"Insertion Failed"];
						return $this->response->setStatusCode(200)->setJSON(json_encode($data));
					}


				}
			}
			return view('book/add_book');
		}else{
			return redirect()->to('/admin');
		}
	}

	public function edit(){
		if($this->admin_auth->isAuthenticated()){
			if($this->request->isAJAX()){
				$rules = [
					"ref_num" => "required|max_length[25]|alpha_dash|bookExists[ref_num]",
					"title" => "required|max_length[250]|string",
					"author" => "required|max_length[250]|string",
					"publisher" => "required|max_length[250]|string",
				];

				$errors = [
					"ref_num" => [
						"bookExists" => "Book does not exist !"
					]
				];

				if (!$this->validate($rules, $errors)) {
					$data['success'] = false;
					$data['errors'] = $this->validator->getErrors();

					return $this->response->setStatusCode(200)->setJSON(json_encode($data));
				} else {
					$ref_num = $this->request->getPost('ref_num');
					$title = $this->request->getPost('title');
					$author = $this->request->getPost('author');
					$publisher = $this->request->getPost('publisher');

					if ($this->book_model->updateBook($ref_num, $title, $author, $publisher)) {
						$data['success'] = true;
						$data['book'] = $this->book_model->fetchBookByRefNum($ref_num);
						return $this->response->setStatusCode(200)->setJSON(json_encode($data));
					} else {
						$data['success'] = false;
						$data['errors'] = ['error' => "Insertion Failed"];
						return $this->response->setStatusCode(200)->setJSON(json_encode($data));
					}
				}				
			}
		}
	}

	public function delete(){
		if ($this->admin_auth->isAuthenticated()) {
			$data = array();
			if ($this->request->getMethod(true)=='GET' and $ref_num = $this->request->getGet('ref_num') ) {
				if($this->book_model->fetchBookByRefNum($ref_num)){
					if($this->book_model->deleteBook($ref_num)){
						$data['success'] = true ;
						$data['msg'] = 'Deleted successfully !';
					}else{
						$data['success'] = true;
						$data['msg'] = 'Deletion Failed !';
					}
					return $this->response->setStatusCode(200)->setJSON($data);
				}else{

					$data['success']=false;
					$data['msg'] = 'Book does not Exist !';

					return $this->response->setStatusCode(200)->setJSON($data);		
				}

			}
		}
	}

	public function uploadCsv(){

		helper('form');
		
		if($this->admin_auth->isAuthenticated()){
			$data=array();
			if($this->request->getMethod(TRUE)=="POST"){

					$rules = [
						"books"=> "uploaded[books]|max_size[books,1024]"
					];

					$errors = [
						"books"=>[
							"max_size"=>"Max Size is 1024 Kb !",
							
						]
					];

					if(!$this->validate($rules,$errors)){
						$data['validation'] = $this->validator;
					}else{
					$file = $this->request->getFile('books');
					echo '
					<style>
					table, th, td {
  						border: 1px solid black;
						}
					</style>';
					echo "<h1>Saving Records ........</h1>";
					if ($file->isValid() == true && $file->getExtension() == "csv" and $file->isExecutable()==false) {
						$filename = $file->getRandomName();
						$path = $file->store('CSV/',$filename);
						$this->save($filename);
						return "<br><h1>Finished saving Records !</h1>";
					} else {
						return "Invalid File !";
					}		
					}
			}
			//generate and add captcha
			$captcha = new Captcha();

			$data['captcha'] = $captcha->generateCaptcha();

			return view("admin/upload_csv",$data);
		}else{
			return redirect()->to("/admin");
		}
	}

	private function save($filename){
		echo '
			<table>
			<tr>
				<th>Reference Number</th>
				<th>Title</th>
				<th>Author</th>
				<th>Publisher</th>
				<th>Addition to DB</th>
			</tr>
		';
		if (($handle = fopen(WRITEPATH."uploads/CSV/".$filename, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				try {
					$success = $this->book_model->addBook( htmlentities($data[0]), htmlentities($data[1]), htmlentities($data[2]), htmlentities($data[3]));
				} catch
				(\mysqli_sql_exception $e ) {
					$success=false;
				}
					if($success){
					echo "<tr><td> " . $data[0] . "</td><td>" . $data[1] . "</td><td>" . $data[2] . "</td><td>" . $data[3] . "</td><td>Success</td></tr>";
					}else{
					echo "<tr><td> " . $data[0] . "</td><td>" . $data[1] . "</td><td>" . $data[2] . "</td><td>" . $data[3] . "</td><td>Failed</td></tr>";
					}
			}
			fclose($handle);
			echo "</table>";
	}
}


public function issue(){
	if($this->admin_auth->isAuthenticated()){
		
		$data=array(
			'ref_num'=>'',
			'title'=>'',
			'author'=>'',
			'publisher'=>''
		);

		if($this->request->getMethod(true)==='POST'){
			$rules=[
				"ref_num"=> "required|alpha_numeric_space|max_length[20]|bookExists[ref_num]|bookAvailable[ref_num]",
				"member_id"=> "required|alpha_numeric_space|max_length[20]",
				"member_name"=> "required|alpha_numeric_space|max_length[250]",
				"member_email"=>"required|valid_email|max_length[250]",		
				"member_mobile"=>"required|numeric|exact_length[10]",
				"member_role"=>"required|validateRole[member_role]",
			];

			$errors = [
				"bookExists"=>"Book does not exist !",
				"isAvailable"=>"Book is not available !"
			];

				if (!$this->validate($rules, $errors)) {
					$data['success'] = false;
					$data['errors'] = $this->validator->getErrors();
				} else {
					$issue_id =strtoupper("IS".bin2hex(random_bytes(4)));

					$book=$this->book_model->fetchBookByRefNum($this->request->getPost('ref_num'));

					$otp = $this->generateOTP();

					$issue_data=[
					'issue_id'=>$issue_id,
					'book_ref_num' => $book['ref_num'],
					'book_title'=>$book['title'],
					'book_author'=>$book['author'],
					'member_id' => $this->request->getPost('member_id'),
					'member_name' => $this->request->getPost('member_name'),
					'member_email' => $this->request->getPost('member_email'),
					'member_mobile' => $this->request->getPost('member_mobile'),
					'member_role' => $this->request->getPost('member_role'),
					'batch' => $this->request->getPost('batch') ?? '',
					'otp' => hash('sha384',$otp),
					'otp_time'=>time()+((5*60)+5)
				];

				$cache_token = new CacheToken();

				$json_value = json_encode($issue_data);

				$cache_token->setToken('cse:library:issue:'.$issue_id,$json_value,'305');
				$mailer = new SendMail($issue_data['member_email'],'Book Issue OTP','To obtain your new book use the OTP: '.$otp.'.');
				$mailer->sendMail();
				$data['success'] = true;
				$data['issue_id'] = $issue_id;

				}
				return $this->response->setStatusCode(200)->setJSON(json_encode($data));
			
			}

		if($this->request->getGet('ref_num')){
			$ref_num = $this->request->getGet('ref_num', FILTER_SANITIZE_STRING);
			$book = $this->book_model->checkBookAvailability($ref_num);
			if(isset($book['ref_num'])){
				$data['ref_num'] = $book['ref_num'];
				$data['title'] = $book['title'];
				$data['author'] = $book['author'];
				$data['publisher'] = $book['publisher'];
			}else{
				$data['error_msg'] = $book;
			}
		}
			
		return view('book/new_issue',$data);

	}
	else{
			return redirect()->to('/admin');
	}
}




public function return(){
	if($this->admin_auth->isAuthenticated()){
		
		$data = array(
			'book_ref_num'=>'',
			'message_exists'=>false
		);

		if($this->request->getGet('ref_num')){
			$ref_num = $this->request->getGet('ref_num') ?? '';
			$entry = $this->entry_model->fetchEntryByRefNum($ref_num);

			$data['message_exists'] = true;

			if(!empty($entry)){
				$data['success'] = true ;
				$data['msg'] = 'Entry Exists';
				$data['entry_exists'] = true ;
				$data = array_merge($data,$entry);
			}else{
					$data['success'] = false;
					$data['msg'] = 'Entry does not exist';
			}

		}

		if($this->request->getMethod(true) === 'POST' ){
			$rules = [
				'pin'=>"required|exact_length[4]|verifyAdminPin[pin]",
				'ref_num'=>"required|string|max_length[20]|bookIssued[ref_num]",
				'issue_id'=>"required|alpha_numeric|exact_length[10]|verifyIssueId[issue_id]"
			];

			$errors = [
				"pin"=>[
					"verifyAdminPin"=>"Invalid Pin !"
				]
			];

			if(!$this->validate($rules,$errors)){
				$data['success'] = false ;
				$data['validation'] = $this->validator;
			}else{
				
				$ref_num =  $this->request->getPost('ref_num') ;
				
				$issue_id = $this->request->getPost('issue_id') ;

				if ($this->entry_model->returnBookEntry($ref_num)) {
					return redirect()->to("/entry//".$issue_id);
				} else {
					return "Transaction Failed !";
				}
				
			}


		}

		return view('book/return_book',$data);
	}else{
		return redirect()->to('/admin');
	}
}
	
}

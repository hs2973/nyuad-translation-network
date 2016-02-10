<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

require_once(APPPATH.'libraries/REST_Controller.php');

class Api extends REST_Controller {

	/**
	 * 
	 * Api Controller
	 * [base_url]/index.php/api
	 *
	 **/
	private $data_array = array('is_approved' => 1);

	public function index(){
		$this->response();
	}

	private function error($msg)
	{
		return array('status' => 'false','error' => $msg);
	}
	
	/**
	 * Get a list of all articles or featured
	 */
	public function articles_get()
	{
		$featured = $this->get('featured');

		$limit = $this->get('limit');
		$offset = $this->get('offset');

		$this->db->limit($limit,$offset);

		if($featured){
			$this->data_array['is_featured'] = 1;
			// $this->response($this->db->get_where('articles', $this->data_array)->result());
		}
		// else{
		// 	$this->response($this->db->get_where('articles', $this->data_array)->result());
		// }

		$query = $this->db->get_where('articles', $this->data_array);

		$rows = array();
		foreach ($query->result_array() as $row)
		{

			$row['translations'] = $this->get_translations($row['id']);

			array_push($rows,$row);
		}

		$this->response($rows);
	}

	/**
	 * Get article with given id
	 * @return article object
	 */
	public function article_get($id = NULL)
	{
		if(!$id){
			$this->response($this->error("Invalid id"));
			exit();
		}

		$data_array = $this->data_array;
		$data_array['id'] = $id;

		$row = $this->db->get_where('articles', $data_array)->row_array();

		if(!$row){
			$this->response($this->error("Invalid id"));
			exit();
		}

		// get all links to translations

		$row['translations'] = $this->get_translations($id);

		$this->response($row);
	}

	/**
	 * Get id of all translations of original article
	 * @return array
	 */
	private function get_translations($id)
	{
		$data_array = $this->data_array;
		$data_array['parent_id'] = $id;

		$query = $this->db->get_where('articles', $data_array);

		$translations = array();
		foreach ($query->result() as $row)
		{
			array_push($translations,$row->id);
		}

		return $translations;
	}

	/**
	 * Get a list of languages (for autocompletion)
	 */
	public function languages_get()
	{
		$this->db->select('language');
		$this->db->distinct();
		$this->db->order_by("language", "asc"); 
		$query = $this->db->get_where('articles', $this->data_array);
		$languages = array();
		foreach ($query->result() as $row)
		{
		    array_push($languages, $row->language);
		}
		$this->response($languages);
	}

	/**
	 *	Get a list of author names (for autocompletion)
	 */
	public function authors_get()
	{
		$this->db->select('author_name');
		$this->db->distinct();
		$this->db->order_by("author_name", "asc"); 
		$query = $this->db->get_where('articles', $this->data_array);
		$authors = array();
		foreach ($query->result() as $row)
		{
		    array_push($authors, $row->author_name);
		}
		$this->response($authors);
	}

	/**
	 *	Get a list of titles (for autocompletion)
	 */
	public function titles_get()
	{
		$this->db->select('title');
		$this->db->select('id');
		$this->db->order_by("title", "asc"); 
		$query = $this->db->get_where('articles', $this->data_array);
		$titles = array();
		foreach ($query->result() as $row)
		{
			//var_dump($row);
			$titles[$row->id] = $row->title;
		    //array_push($titles, $row->title);
		}
		$this->response($titles);
	}

	/**
	 * Search 'articles' table based on @language, @author_name, @title
	 */
	public function search_get()
	{
		$language = $this->get('language');
		$author = $this->get('author');
		$title = $this->get('title');

		$limit = $this->get('limit');
		$offset = $this->get('offset');

		if(!(strlen($language) >=3 or strlen($author) >=3 or strlen($title) >= 3)){
			$this->response(array('status' => 'false','error' => 'Invalid search string'));
			exit();
		}

		$this->db->select('id, author_name, title, is_translation, language, parent_id');
		$this->db->limit($limit,$offset);

		if($language)
		{
			$this->db->like('language', $language);
		}
		elseif($author)
		{
			$pieces = explode(" ", $author);
			foreach ($pieces as $piece)
			{
				$this->db->like('author_name', $piece);
			}
		}
		elseif($title)
		{
			$pieces = explode(" ", $title);
			foreach ($pieces as $piece)
			{
				$this->db->like('title', $piece);
			}
		}

		$rows_array = $this->db->get_where('articles', $this->data_array)->result_array();

		foreach ($rows_array as $key=>$row)
		{
			if($row['parent_id'] != 0)
			{
				$this->db->select('title');
				$this->db->from('articles');
				$this->db->where('id', $row['parent_id']);
				$query = $this->db->get();

				$rows_array[$key]['parent_title'] = $query->row_array()['title'];
			}
		}

		$this->response($rows_array);	
	}

	/**
	 * POST article
	 */
	public function article_post()
	{
		date_default_timezone_set('Asia/Dubai');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('editor', 'Text', 'required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('author_name', 'Author Name', 'trim|required');
		$this->form_validation->set_rules('author_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('language', 'Language', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->response(array('status'=>'error', 'message' => validation_errors()));
			return false;
		}

		$data = array(
            'text' => $this->input->post('editor'),
            'title' => $this->input->post('title'),
            'author_name' => $this->input->post('author_name'),
            'author_email' => $this->input->post('author_email'),
            'language' => $this->input->post('language'),
            'is_translation' => $this->input->post('is_translation'),
            'parent_id' => $this->input->post('parent_id'),
            'date_created' => date('Y-m-d H:i:s'),
        );

        if($this->db->insert('articles', $data))
        {
        	//if success, send email notifications
        	$this->load->library('email');

        	// email notification to the contributor
	        $subject = 'Thank you for your submission';
	        $message = '<p>Dear '.$data['author_name'].',</p>';
	        $message .= '<p>Thank you for contributing to <a href="http://translationnetwork.org">Translation Network</a>. A member of the Network will receive your submission and post it at their earliest convenience.</p>';
	        $message .= '<p>Check back to see if your submission has been carried over into other languages. We hope you will consider posting something again soon!</p>';
	        $message .= '<p>Thank You,</p>';
	        $message .= '<p>Translation Network </p>';

	        $body = $this->email->full_html($subject, $message);

	        $result = $this->email
	            ->from('submissions@translationnetwork.org', "Translation Network")
	            ->reply_to('nyuad.translationnetwork@nyu.edu')    // Optional, an account where a human being reads.
	            ->to($data['author_email'])
	            ->subject($subject)
	            ->message($body)
	            ->send();

	        $subject = 'A new submission has been received';
	        $message = '<p>Dear Editors,</p>';
	        $message .= '<p>A new submission has been recieved in Translation Network. Please login to <a href="http://admin.translationnetwork.org">admin.translationnetwork.org</a> to view the article. A snapshot view of the article has been provided below for future references.</p>';
	        $message .= '<p>Title of the article: '.$data['title'].'<br/>Author Name: '.$data['author_name'].'<br/>Author Email: '.$data['author_email'].'<br/>Language: '.$data['language'].'</p>';
	        $message .= '<p>Thank You,</p>';
	        $message .= '<p>Translation Network </p>';

	        $body = $this->email->full_html($subject, $message);

	        $result = $this->email
	            ->from('submissions@translationnetwork.org', "Translation Network")
	            ->to('nyuad.translationnetwork@nyu.edu')
	            ->subject($subject)
	            ->message($body)
	            ->send();

        	$this->response(array('status'=>'success'));
        }
        else{
        	//if failure, send failed response
        	$this->response($this->error('Insert failed'));
        }
	}
}

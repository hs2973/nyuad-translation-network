<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/REST_Controller.php');

class Api extends REST_Controller {

	/**
	 * 
	 * Api Controller
	 * [base_url]/index.php/api
	 *
	 **/
	private $data_array = array('is_approved' => 1);
	
	public function articles_get()
	{
		$id = $this->get('id');
		$featured = $this->get('featured');

		$limit = $this->get('limit');
		$offset = $this->get('offset');

		$this->db->limit($limit,$offset);

		if($featured){
			$this->data_array['is_featured'] = 1;
			$this->response($this->db->get_where('articles', $this->data_array)->result());
		}

		if($id){
			$this->data_array['id'] = $id;
			$this->response($this->db->get_where('articles', $this->data_array)->row());
		}
		else{
			$this->response($this->db->get_where('articles', $this->data_array)->result());
		}		
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
				$this->db->or_like('author_name', $piece);
			}
		}
		elseif($title)
		{
			$pieces = explode(" ", $title);
			foreach ($pieces as $piece)
			{
				$this->db->or_like('title', $piece);
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

}

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
	
	public function articles_get($id = NULL, $featured = NULL)
	{
		$id = $this->get('id');
		$featured = $this->get('featured');

		if($featured){
			//	var_dump($featured);
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
}

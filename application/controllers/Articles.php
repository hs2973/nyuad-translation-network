<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/REST_Controller.php');

class Articles extends REST_Controller {

	/**
	 * 
	 * Articles Controller
	 * [base_url]/index.php/articles
	 *
	 **/

	//echo "This URL/Controller will handle all future API requests.";
	
	public function index_get($id = NULL)
	{
		$id = $this->get('id');

		if($id){
			$this->response($this->db->get_where('articles', array('id' => $id))->row());
		}
		else{
			$this->response($this->db->get('articles')->result());
		}
				
	}
}

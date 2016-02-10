<?php
class Articles_model extends CI_Model {
 
    /**
    * Get article by his is
    * @param int $article_id 
    * @return array
    */
    public function get_article_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('articles');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$data = $query->row_array(); 

		if($data['parent_id'] != 0){
			$this->db->select('title');
			$this->db->from('articles');
			$this->db->where('id', $data['parent_id']);
			$query = $this->db->get();

			$data['parent_title'] = $query->row_array()['title'];
		}

		return $data;

    }

    /**
    * Fetch articles data from the database
    */
    public function get_articles($getwhere_array = array(), $order = NULL, $order_type='Asc', $limit_start, $limit_end)
    {
	    
		$this->db->select('articles.id');
		$this->db->select('articles.title');
		$this->db->select('articles.author_name');
		$this->db->select('articles.language');
		$this->db->select('articles.author_email');
		$this->db->select('articles.date_created');
		$this->db->select('articles.is_approved');
		$this->db->select('articles.parent_id');
		$this->db->from('articles');
		$this->db->where($getwhere_array);

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
		}


		$this->db->limit($limit_start, $limit_end);

		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    /**
    * Count the number of rows
    * @param int $manufacture_id
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_articles($getwhere_array, $order=null)
    {
		$this->db->select('*');
		$this->db->from('articles');
		$this->db->where($getwhere_array);

		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}

		$query = $this->db->get();
		return $query->num_rows();        
    }

    function update_article($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('articles', $data);
		$report = array();
/*		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();*/
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}
}	
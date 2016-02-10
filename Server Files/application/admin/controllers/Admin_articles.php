<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_articles extends CI_Controller {

	/**
	 * 
	 * Admin_articles panel
	 *
	 **/
	
	public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('is_logged_in')){
            redirect('login');
        }

        $this->load->model('articles_model');
        $this->load->library('pagination');
    }

    public function index()
    {	
    	$getwhere_array = array();

    	//show only featured articles
    	$featured = $this->input->get('featured');

    	//show only new submissions
    	$approved = $this->input->get('approved');

    	if($featured == 1){
    		$getwhere_array['is_featured'] = 1;
    	}

    	if($approved == "false"){
    		$getwhere_array['is_approved'] = 0;
    	}

    	//order settings
    	$order = $this->input->get('order');
    	$order_type = $this->input->get('orderType');

    	/*if($order == NULL){
    		$order = "date_created";
    	}

    	if($order_type == NULL){
    		$order_type = "DESC";
    	}*/

        //pagination settings
        $config['per_page'] = 10;
        $config['base_url'] = site_url().'/articles';
        if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;

         //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        //limit end
        $page = $this->uri->segment(2);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        }      

        $data['featured'] = $featured;
        $data['approved'] = $approved;

        //make the data type var avaible to our view
        $data['order'] = $order;
        $data['order_type_selected'] = $order_type; 

        //fetch sql data into arrays
        $data['count_articles']= $this->articles_model->count_articles($getwhere_array);
        $data['articles'] = $this->articles_model->get_articles($getwhere_array, $order, $order_type, $config['per_page'],$limit_end);        
        $config['total_rows'] = $data['count_articles'];

        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/articles/list';
        $this->load->view('includes/template', $data); 
    }

    public function view($id = NULL)
    {
    	if($id == NULL){

    	}

    	//product data 
        $data['article'] = $this->articles_model->get_article_by_id($id);

        //var_dump($data['article']);
        if($data['article'] == NULL){
        	show_404();
        };
        
        $data['main_content'] = 'admin/articles/view';
        $this->load->view('includes/template', $data);      
    }

    public function edit($id = NULL)
    {
    	if($id == NULL){

    	}

    	//product data 
        $data['article'] = $this->articles_model->get_article_by_id($id);

        //var_dump($data['article']);
        if($data['article'] == NULL){
        	show_404();
        };
        
        $data['main_content'] = 'admin/articles/edit';
        $this->load->view('includes/template', $data);      
    }

    public function save($id = NULL)
    {
    	//if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            /*//form validation
            $this->form_validation->set_rules('title', 'Article title', 'required');
            $this->form_validation->set_rules('editor', 'Text content', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {*/
            $data_to_update = array(
                'text' => $this->input->post('editor'),
                'title' => $this->input->post('title'),
            );
            //if the insert has returned true then we show the flash message
            if($this->articles_model->update_article($id, $data_to_update)){
                $data['flash_message'] = TRUE; 
            }else{
                $data['flash_message'] = FALSE; 
            }
        }

        $data['article'] = $this->articles_model->get_article_by_id($id);
        
        $data['main_content'] = 'admin/articles/edit';
        $this->load->view('includes/template', $data);      
    }

    public function publish($id = NULL){
        $data_to_update = array(
            'is_approved' => 1,
        );
        //if the insert has returned true then we show the flash message
        if($this->articles_model->update_article($id, $data_to_update)){
            $data['flash_message'] = TRUE; 
        }else{
            $data['flash_message'] = FALSE; 
        }

        $data['article'] = $this->articles_model->get_article_by_id($id);
        
        $data['main_content'] = 'admin/articles/view';
        $this->load->view('includes/template', $data);  
    }
    
    public function unpublish($id = NULL){
        $data_to_update = array(
            'is_approved' => 0,
        );
        //if the insert has returned true then we show the flash message
        if($this->articles_model->update_article($id, $data_to_update)){
            $data['flash_message'] = TRUE; 
        }else{
            $data['flash_message'] = FALSE; 
        }


        $data['article'] = $this->articles_model->get_article_by_id($id);
        
        $data['main_content'] = 'admin/articles/view';
        $this->load->view('includes/template', $data);  
    }

    public function feature($id = NULL){
        $data_to_update = array(
            'is_featured' => 1,
        );
        //if the insert has returned true then we show the flash message
        if($this->articles_model->update_article($id, $data_to_update)){
            $data['flash_message'] = TRUE; 
        }else{
            $data['flash_message'] = FALSE; 
        }


        $data['article'] = $this->articles_model->get_article_by_id($id);
        
        $data['main_content'] = 'admin/articles/view';
        $this->load->view('includes/template', $data);  
    }

    public function unfeature($id = NULL){
        $data_to_update = array(
            'is_featured' => 0,
        );
        //if the insert has returned true then we show the flash message
        if($this->articles_model->update_article($id, $data_to_update)){
            $data['flash_message'] = TRUE; 
        }else{
            $data['flash_message'] = FALSE; 
        }


        $data['article'] = $this->articles_model->get_article_by_id($id);
        
        $data['main_content'] = 'admin/articles/view';
        $this->load->view('includes/template', $data);  
    }

    public function delete($id = NULL){
        if($this->db->delete('articles', array('id' => $id))){
            // $data['flash_message'] = TRUE; 
            $this->session->set_flashdata('success', 'true');
        }else{
            $this->session->set_flashdata('success', 'false');
        }

        $this->session->set_flashdata('success', 'true');

        redirect('articles');
    }
}

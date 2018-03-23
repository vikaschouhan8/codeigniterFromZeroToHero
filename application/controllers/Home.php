<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// load Pagination library
		$this->load->library('pagination');
		// load URL helper
		$this->load->helper('url');
		//load home model
		$this->load->model('home_model');
		$this->check_isvalidated();
	}

	public function index() {
		echo '<h4>Congratulations, you are logged in.</h4>';
		// Add a link to logout
		//get data from db
		$params = array();

		$params['images'] = $this->home_model->get_images();
        // init params
        $limit_per_page = 8;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->home_model->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $params["results"] = $this->home_model->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'home/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
             
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
        if ($this->input->post('name_search') != "") {
			$params["record"] = $this->search();
			// print_r($params["record"]);
		}
        $this->load->view('home_view', $params);
	}
	
	public function search(){
		if($this->input->post('name_search') != "")
		{	
			$data = $this->input->post('name_search');
			$result = $this->home_model->search_in_db($data);
			// $this->load->view('search_view', $result);
			return $result;		
		}
		else{
		redirect('');			
		}	
	}
	private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
	}
	
	public function do_logout(){
		$this->session->sess_destroy();
        redirect('login');
    }
	public function test()
	{
		echo "test";
	}
	public function delete($id){
		$this->home_model->row_delete($id);
		redirect('');  
	}

	public function edit($id){
		$this->home_model->row_delete($id);
		redirect(''); 
	}

		
	public function input($id){
		$data['name'] = "vikas_edit_again";
		$data['id'] = $id;
		$data['uploaded_on'] = '2018-03-02 00:00:00';		
		$this->home_model->update_entry($data);
		redirect(''); 
	}

	public function input_edit($id){
		
		$data=[];
		$data['result'] = $this->home_model->get_row_from_id($id);
		$this->load->view('edit', $data);		
	}

	// public function input_edit_function(){
	// 	$this->home_model->update_entry($data);
	// 	redirect(''); 
	// }

	public function input_edit_function(){
		$data['id'] = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['uploaded_on'] = $this->input->post('uploaded_on');		
		$this->home_model->update_entry($data);
		redirect(''); 
	}

	public function create(){
		$data['name'] = "vikash11";
		$data['id'] = 13;
		$data['uploaded_on'] = '2016-03-02 00:00:00';
		$this->home_model->insert_entry($data);
		redirect('');
	}

	public function add(){

		if($this->input->post('name') != "" && $this->input->post('uploaded_on') != "")
		{
			$data['name'] = $this->input->post('name');
			$data['uploaded_on'] = $this->input->post('uploaded_on');
			$this->home_model->add_entry($data);

		//	redirect("/home/index?action=success");
		}
		else{
			
		}
		redirect('');
	}
}

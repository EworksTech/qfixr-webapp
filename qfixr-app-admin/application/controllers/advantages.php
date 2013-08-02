<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Advantages extends CI_Controller{
	
	public function __construct(){
		
		parent::__construct();
		/*
		if(!isset($_POST['appsender'])){
			if(!$this->session->userdata('logged_in')){
				redirect('login', 'refresh');
			}
		}
		*/
		$this->load->model('advantages_model');
		$this->load->helper("url");
		$this->load->library("pagination");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');

		
	}
	
	public function index($page=0,$search_word=''){

		
		$config["base_url"] = base_url() . "index.php/advantages/index";
		$config["total_rows"] = $this->advantages_model->get_advantages_total($search_word);
		$config["per_page"] = 20;
		
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';
		
		$config['first_link'] = '&laquo; Primeiro';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Último &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = 'Próximo &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '&larr; Anterior';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		
		$data["pagination_links"] = $this->pagination->create_links();
		
		$data['dbadvantages'] = $this->advantages_model->get_advantages($config["per_page"], $page, $search_word);
		$data['title']	 = 'Edit Advantages';
		
		$this->load->view('advantages_view',$data);
		
			
	}
	
	public function create(){
				
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Crie uma Vantagem';
		
		$this->form_validation->set_rules('cpf', 'CPF', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		if ($this->form_validation->run() === FALSE){
			
			$this->load->view('advantages_view_create');
			
		}else{
			
			$this->clients_model->set_client();
			redirect('advantages','location');
		}	 
	}
	
	public function edit($id){
		
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Editar Vantagem';
		$data['id'] = $id;
		
		$edit_result = $this->advantages_model->get_advantage($id);
		
		$data['advantage_prop'] = $edit_result[0];
		
		$this->load->view('advantages_view_edit',$data);			 
		
			 
	}
	
	function upload($id='') {
		
        $config = array(
		
            'upload_path'   => './uploads/',
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '1000',
            'max_width'     => '1024',
            'max_height'    => '768',
            'encrypt_name'  => true,
			
        );

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("image")) { 
		       
		    $error = array('error' => $this->upload->display_errors());
			
			if($id==''){
				
            	$this->load->view('advantages_view_create', $error);
			
			} else {
				
				$status = 0;
				
				if($this->input->post('status') == "on"){
					$status = 1;
				}
				
				
				$now = date("Y-m-d H:i:s");				
				$data_ary = array(
				
					'status' 			=> $status,
					'title' 			=> $this->input->post('title'),
					'description' 		=> $this->input->post('description'),
					'created_date' 		=> $now
					
				);				
				
				$this->db->where('id', $id);
				$this->db->update('advantages', $data_ary);
				
				//echo $this->db->last_query();
				
				
				redirect('advantages','refresh');
				
			}
			
		} else {
			
            $now = date("Y-m-d H:i:s");
			$upload_data = $this->upload->data("image");
			$this->createThumbnail($upload_data['file_name']);
			
			$status = 0;
				
			if($this->input->post('status') == "on"){
				$status = 1;
			}
			
			
			$data_ary = array(
			
                'image'				=> $upload_data['file_name'],
				'thumb'				=> $upload_data['raw_name']. '_thumb' .$upload_data['file_ext'],
                'status' 			=> $status,
				'title' 			=> $this->input->post('title'),
				'description' 		=> $this->input->post('description'),
                'created_date' 		=> $now
            );
			
			if($id==""){
				$this->db->insert('advantages', $data_ary);
			} else {
				$this->db->where('id', $id);
				$this->db->update('advantages', $data_ary);
			}
			
			redirect('advantages','refresh');
        }
    }
	
	function createThumbnail($filename)
 
    {
 
        $config['image_library']    = "gd2";      
 
        $config['source_image']     = './uploads/'.$filename;      
 
        $config['create_thumb']     = TRUE;      
 
        $config['maintain_ratio']   = TRUE;      
 
        $config['width'] = "123";      
 
        $config['height'] = "103";
 
        $this->load->library('image_lib',$config);
 
        if(!$this->image_lib->resize())
 
        {
 
            echo $this->image_lib->display_errors();
 
        }      
 
    }
	
	function json($id=NULL){
		
		if(!isset($id)){
			
			$data['dbadvantages'] = $this->advantages_model->get_all_advantages();
			$this->load->view('advantages_json_view',$data);
		
		} else {
			
			$data['dbadvantages'] = $this->advantages_model->get_all_advantages();
			$data['dbparticipating'] = $this->advantages_model->get_participating($id);
			$this->load->view('advantages_json_view',$data);
			
		}
	}
	
	function participate(){
		
		
		$data_arry = array(
			
                'id_client'				=> $this->input->post('id_client'),
				'id_advantage'			=> $this->input->post('id_advantage'),
                
         );
			
			$this->db->insert('participating', $data_arry);
						
			$data['advantage']  = $data_arry;
            $this->load->view('advantages_participate_view',$data);		

	}
	
	function advantage($id=''){
				
		$edit_result = $this->advantages_model->get_advantage($id);
				
		$data['advantage_prop'] = $edit_result[0];		
		$this->load->view('advantages_get_view',$data);		

	}
}
?>
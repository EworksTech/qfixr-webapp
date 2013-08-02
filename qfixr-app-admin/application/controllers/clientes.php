<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();



class Clientes extends CI_Controller{
	
	public function __construct(){
		
		parent::__construct();
		
		if(!isset($_POST['appsender'])){
			if(!$this->session->userdata('logged_in')){
				redirect('login', 'refresh');
			}
		}
				
		$this->load->model('clientes_model');
		$this->load->helper("url");
		$this->load->library("pagination");
		$this->load->helper('form');

	
	}
	
	public function index($page=0,$search_word=''){
		
			
		$config["base_url"] = base_url() . "index.php/clientes/index";
		$config["total_rows"] = $this->clientes_model->get_clients_total($search_word);
		$config["per_page"] = 20;
		//$config["uri_segment"] = 3;
		
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
		
		$data['dbclientes'] = $this->clientes_model->get_clients($config["per_page"], $page, $search_word);
		$data['title']	 = 'Edit Clients';
		
		$this->load->view('clientes_view',$data);
		
			
	}
	
	public function create(){
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Create a Client';
		
		
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required');
		
		
		
		if ($this->form_validation->run() === FALSE){
			
			$this->load->view('clientes_view_create');
			
		}else{
			
			$this->clientes_model->set_client();
			redirect('clientes','location');
		}	 
	}
	
	public function edit($id){
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Edit Client';
		$data['id'] = $id;
		
		$edit_result = $this->clientes_model->get_client($id);
		
		$data['cliente_prop'] = $edit_result[0];
		
		/*
		$this->form_validation->set_rules('cpf', 'CPF', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('cellphone', 'Cellphone', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		*/
		
		if ($this->form_validation->run() === FALSE){
			
			$this->load->view('clientes_view_edit',$data);
			
		}else{
			
			$this->clientes_model->edit_client();
			redirect('clientes','location');
		}	 
	}
	
	public function json(){
		
		$now = date("Y-m-d H:i:s");
		$card = date("siH.d.m.Y");
		
		$data_arry = array(
			
                'cpf'				=> $this->input->post('cpf'),
				'name'				=> $this->input->post('name'),
                'cellphone' 		=> $this->input->post('cellphone'),
				'address' 			=> $this->input->post('address'),
				'card ' 			=> $card,
                'created_date' 		=> $now
            );
			
			$this->db->insert('clients', $data_arry);
			
			$data_arry['id']  = $this->db->insert_id();
			$data_arry['cpf'] = _mask($this->input->post('cpf'),'###.###.###-##');	
			$data['client']   = $data_arry;
            $this->load->view('clients_view_json',$data);
		
	}
	
	
}
function _mask($val, $mask){
		
	 $maskared = '';
	 $k = 0;
	 for($i = 0; $i<=strlen($mask)-1; $i++) {
		 if($mask[$i] == '#') {
			 
		 if(isset($val[$k]))
			$maskared .= $val[$k++];
		 } else {
			if(isset($mask[$i]))
			$maskared .= $mask[$i];
		 }
	 }
	 return $maskared;
	}
	/*
	echo mask($cnpj,'##.###.###/####-##');
	echo mask($cpf,'###.###.###-##');
	echo mask($cep,'#####-###');
	echo mask($data,'##/##/####');
	*/
?>
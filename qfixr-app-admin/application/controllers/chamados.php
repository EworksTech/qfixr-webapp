<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();



class Chamados extends CI_Controller{
	
	public function __construct(){
		
		parent::__construct();
		
		
		if(!isset($_POST['appsender'])){
			if(!$this->session->userdata('logged_in')){
				redirect('login', 'refresh');
			}
		}
				
		$this->load->model('chamados_model');
		$this->load->model('clientes_model');
		$this->load->helper("url");
		$this->load->library("pagination");
		$this->load->helper('form');

	
	}
	
	public function index($page=0,$search_word=''){
		
			
		$config["base_url"] = base_url() . "index.php/chamados/index";
		$config["total_rows"] = $this->chamados_model->get_calls_total($search_word);
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
		
		$data['dbchamados'] = $this->chamados_model->get_calls($config["per_page"], $page, $search_word);
		
		for($i=0;$i<count($data['dbchamados']);$i++){
			$cliente = $this->clientes_model->get_client($data['dbchamados'][$i]['id_cliente']);
			$data['dbchamados'][$i]['cliente'] = $cliente[0]['nome']; 
		}
		
		
		$data['title']	 = 'Edit calls';
		
		$this->load->view('chamados_view',$data);
		
			
	}
	
	public function create($id=''){
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Create a Client';
		if($id != ''){
			$data['id_cliente'] = $id;
		}
		$data['servicos'] =  $this->chamados_model->get_services();
		$data['dispositivos'] =  $this->chamados_model->get_devices();
		
		$this->form_validation->set_rules('id_servico', 'Serviço', 'required');
			
		
		if ($this->form_validation->run() === FALSE){
			
			$this->load->view('chamados_view_create',$data);
			
		}else{
			
			$this->chamados_model->set_call();
			redirect('chamados','location');
		}	 
	}
	
	public function edit($id){
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Edit Client';
		$data['id'] = $id;
		
		$edit_result = $this->chamados_model->get_client($id);
		
		$data['cliente_prop'] = $edit_result[0];
		
		/*
		$this->form_validation->set_rules('cpf', 'CPF', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('cellphone', 'Cellphone', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		*/
		
		if ($this->form_validation->run() === FALSE){
			
			$this->load->view('chamados_view_edit',$data);
			
		}else{
			
			$this->chamados_model->edit_client();
			redirect('chamados','location');
		}	 
	}
	
	public function json(){
		
		$data['dbchamados'] = $this->chamados_model->get_all_calls();
		
		for($i=0;$i<count($data['dbchamados']);$i++){
			
			$cliente = $this->clientes_model->get_client($data['dbchamados'][$i]['id_cliente']);
			
			$data['dbchamados'][$i]['rua'] 	  = $cliente[0]['rua'];
			$data['dbchamados'][$i]['numero'] = $cliente[0]['numero']; 
			$data['dbchamados'][$i]['bairro'] = $cliente[0]['bairro']; 
			$data['dbchamados'][$i]['cidade'] = $cliente[0]['cidade']; 
			
		}
		
		$this->load->view('chamados_json_view',$data);
		
	}
	
	public function item($id=''){
		
		$data['dbchamado'] = $this->chamados_model->get_call($id);
		$data['dbcliente'] = $this->clientes_model->get_client($data['dbchamado'][0]['id_cliente']);
		
		$device 	= $this->chamados_model->get_device($data['dbchamado'][0]['id_dispositivo']);
		$service 	= $this->chamados_model->get_service($data['dbchamado'][0]['id_servico']);
		$data['dbchamado'][0]['id_servico'] 	= $service[0]['nome'];
		$data['dbchamado'][0]['id_dispositivo'] = $device[0]['nome'];
		
		$this->load->view('chamados_item_view',$data);
		
	}
	
	public function atender($id=''){
		
		$data['dbchamado'] = $this->chamados_model->set_request_call($id);		
		$this->load->view('chamados_atender_view',$data);
		
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
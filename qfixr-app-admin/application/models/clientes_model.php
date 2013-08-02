<?php
class Clientes_model extends CI_Model{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->database();
			
	}
	
	public function get_clients($limit, $start, $word){
		
		$this->db->limit($limit, $start);
		
		if($word == ''){
			$query = $this->db->get('clientes');
			return $query->result_array();
		} else {
			$query = $this->db->query("SELECT * FROM clientes WHERE nome LIKE '%".$word."%'");
			return $query->result_array();
		}
		
	
	
	}
	public function get_client($id){
		
		$query = $this->db->query("SELECT * FROM clientes WHERE id =".$id);
		return $query->result_array();
		
	}
	
	public function set_client(){
		
		$now  = date("Y-m-d H:i:s");
		
		$data = array(
			'nome' => $this->input->post('nome'),
			'telefone' => $this->input->post('telefone'),
			'email' => $this->input->post('email'),
			'rua' => $this->input->post('rua'),
			'numero' => $this->input->post('numero'),
			'bairro' => $this->input->post('bairro'),
			'cidade' => $this->input->post('cidade'),
			'cep' => $this->input->post('cep'),
			'criado_em' => $now 
		);
		
		return $this->db->insert('clientes', $data);
	}
	
	public function edit_client(){
		
		$now = date("Y-m-d H:i:s");
		
		$id = $this->input->post('id');	
		
		$data = array(
			
			'nome' => $this->input->post('nome'),
			'telefone' => $this->input->post('telefone'),
			'email' => $this->input->post('email'),
			'rua' => $this->input->post('rua'),
			'numero' => $this->input->post('numero'),
			'bairro' => $this->input->post('bairro'),
			'cidade' => $this->input->post('cidade'),
			'cep' => $this->input->post('cep'),
		
		);
		
		$this->db->where('id', $id);
		return $this->db->update('clientes', $data);
	}
	
	public function get_clients_total($word){
		if($word == ''){
			return $this->db->count_all("clientes");
		} else {
			$this->db->query("SELECT * FROM clientes WHERE nome LIKE '%".$word."%'");
			return $this->db->count_all_results();
		}
		
	}
}
?>
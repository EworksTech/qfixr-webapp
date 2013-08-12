<?php
class chamados_model extends CI_Model{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->database();
			
	}
	
	public function get_calls($limit, $start, $word){
		
		$this->db->limit($limit, $start);
		
		if($word == ''){
			$query = $this->db->get('chamados');
			return $query->result_array();
		} else {
			$query = $this->db->query("SELECT * FROM chamados WHERE nome LIKE '%".$word."%'");
			return $query->result_array();
		}	
	
	
	}
	
	public function get_all_calls(){
		
		$query = $this->db->query("SELECT * FROM chamados WHERE id_tecnico IS NULL");
		return $query->result_array();
		
	}
	
	public function get_call($id){
		
		$query = $this->db->query("SELECT * FROM chamados WHERE id =".$id);
		return $query->result_array();
		
	}
	
	
	public function get_service($id){
		$query = $this->db->query("SELECT nome FROM servicos WHERE id =".$id);
		return $query->result_array();
	}
	public function get_device($id){
		$query = $this->db->query("SELECT nome FROM dispositivos WHERE id =".$id);
		return $query->result_array();
	}
	
	public function set_call(){
		
		$now  = date("Y-m-d H:i:s");
		
		$data = array(
			'id_cliente' => $this->input->post('id_cliente'),
			'id_servico' => $this->input->post('id_servico'),
			'id_dispositivo' => $this->input->post('id_dispositivo'),
			'descricao' => $this->input->post('descricao'),
			'agendar' => $this->input->post('agendar'),
			'criado_em' => $now 
		);
		
		return $this->db->insert('chamados', $data);
	}
	
	public function edit_call(){
		
		$now = date("Y-m-d H:i:s");
		
		$id = $this->input->post('id');	
		
		$data = array(
			
			'id_client' => $this->input->post('id_cliente'),
			'id_servico' => $this->input->post('id_servico'),
			'id_dispositivo' => $this->input->post('id_dispositivo'),
			'descricao' => $this->input->post('rua'),
			'agenda' => $this->input->post('agendar'),
			'criado_em' => $now 
		
		);
		
		$this->db->where('id', $id);
		return $this->db->update('chamados', $data);
	}
	
	public function get_calls_total($word){
		if($word == ''){
			return $this->db->count_all("chamados");
		} else {
			$this->db->query("SELECT * FROM chamados WHERE nome LIKE '%".$word."%'");
			return $this->db->count_all_results();
		}
		
	}
	
	public function get_services(){
		
		$query = $this->db->query("SELECT * FROM servicos ORDER BY nome");
		return $query->result_array();
		
	}
	public function get_devices(){
		
		$query = $this->db->query("SELECT * FROM dispositivos ORDER BY nome");
		return $query->result_array();
		
	}
	
	public function set_request_call($id){
			
		
		$data = array(
			
			'id_tecnico' => $this->input->post('id_tecnico'),
		
		);
		
		$this->db->where('id', $id);
		return $this->db->update('chamados', $data);
		
	}
	//meus chamados
	public function get_all_mycalls($id){
		
		$query = $this->db->query("SELECT * FROM chamados WHERE id_tecnico =".$id." AND finalizado_em IS NULL");
		return $query->result_array();
		
	}
	public function get_all_myclosedcalls($id){
		
		$query = $this->db->query("SELECT * FROM chamados WHERE id_tecnico =".$id." AND finalizado_em IS NOT NULL");
		return $query->result_array();
		
	}
	
	public function set_checkin($id){
		
		$now = date("Y-m-d H:i:s");		
		$data = array(
			
			'checkin_em' => $now 
		
		);		
		$this->db->where('id', $id);
		return $this->db->update('chamados', $data);
	}
	
	public function set_checkout($id){
		
		$now = date("Y-m-d H:i:s");		
		$data = array(
			
			'finalizado_em' => $now 
		
		);		
		$this->db->where('id', $id);
		return $this->db->update('chamados', $data);
	}
	
	public function get_progress($id){
		$query = $this->db->query("SELECT * FROM andamento WHERE id_chamado=".$id." ORDER BY criado_em DESC");
		return $query->result_array();
	}
	
	public function set_progress(){
		
		$now = date("Y-m-d H:i:s");		
		$data = array(
			'id_chamado' => $this->input->post('id_chamado'),
			'id_tecnico' => $this->input->post('id_tecnico'),
			'descricao' => $this->input->post('descricao'),
			'criado_em' => $now 
		
		);	
		return $this->db->insert('andamento', $data);
	}
	//tecnico
	public function get_technician(){
		
		$user = $this->input->post('usuario');
		$pass = $this->input->post('senha');
		$query = $this->db->query("SELECT * FROM tecnicos WHERE user = '$user' AND password='$pass'");
		return $query->result_array();
		
	}
}
?>
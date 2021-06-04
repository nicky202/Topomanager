<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function insert_service(){
		$libelle_service = trim($this->input->post('nom_service'));
		$acronyme = trim($this->input->post('acronyme'));
		$id_direction = trim($this->input->post('direction'));
		if (!empty($libelle_service) and !empty($acronyme)){
			if (!empty($id_direction)){
				$data = array('libelle_service' => $libelle_service,
					'acronyme_service' => $acronyme,
					'id_direction' => $id_direction);
				$this->db->insert('service', $data);
				return ($this->db->affected_rows() != 1) ? false : true;
			} else {
				$data = array('libelle_service' => $libelle_service,
					'acronyme_service' => $acronyme);
				$this->db->insert('service', $data);
				return ($this->db->affected_rows() != 1) ? false : true;
			}

		}
		else{
			return false;
		}


	}

	public function list_service(){
		$libelle_service = trim($this->input->post('nom_service'));

		if(!empty($libelle_service)){
			$sql = "SELECT s.id_service, s.libelle_service, s.acronyme_service, d.libelle_direction FROM
		 service s LEFT JOIN direction d ON s.id_direction = d.id_direction WHERE s.libelle_service = ?";
			$query =  $this->db->query($sql, array($libelle_service));
			return $query->result();
		}else{
			$sql = "SELECT s.id_service, s.libelle_service, s.acronyme_service, d.libelle_direction FROM
		 service s LEFT JOIN direction d ON s.id_direction = d.id_direction";
			$query =  $this->db->query($sql);
			return $query->result();
		}
	}

	public function update_service(){

		$libelle_service = trim($this->input->post('nom_service'));
		$acronyme_service = trim($this->input->post('acronyme'));
		$id_direction = trim($this->input->post('direction'));

		//$data = array('libelle_type_utilisateur' => $libelle_type_utilisateur);
		$id = trim($this->input->post('id'));


		if(!empty($libelle_service) and !empty($acronyme_service)){
			if(empty($id_direction)){
				$sql = "UPDATE service SET libelle_service = ?, acronyme_service = ? WHERE id_service = ?";
				$this->db->query($sql, array($libelle_service,$acronyme_service , $id));
				return ($this->db->affected_rows() != 1) ? false : true;
			}else{
				$sql = "UPDATE service SET libelle_service = ?, acronyme_service = ?, id_direction = ? WHERE id_service = ?";
				$this->db->query($sql, array($libelle_service,$acronyme_service, $id_direction , $id));
				return ($this->db->affected_rows() != 1) ? false : true;
			}

		}else{
			return false;
		}
	}

	public function get_service_by_id($id){
		if(!empty($id)){
			return $this->db->select(array('id_service','libelle_service', 'acronyme_service', 'id_direction'))
				->from('service')
				->where('id_service', $id)
				->get()
				->result();
		}
	}

	public function delete_one($id){
		if(!empty($id)){
			$sql = "DELETE FROM service WHERE id_service = ?";
			$this->db->query($sql,array($id));
		}
	}

}




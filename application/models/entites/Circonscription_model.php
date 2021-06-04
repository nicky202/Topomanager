<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Circonscription_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function insert_circonscription(){
		$libelle_circonscription = trim($this->input->post('nom_circo'));
		$acronyme = trim($this->input->post('acronyme'));
		$id_service = trim($this->input->post('service'));
		if (!empty($libelle_circonscription) and !empty($acronyme)){
			if (!empty($id_service)){
				$data = array('libelle_circonscription' => $libelle_circonscription,
					'acronyme_circonscription' => $acronyme,
					'id_service' => $id_service);
				$this->db->insert('circonscription', $data);
				return ($this->db->affected_rows() != 1) ? false : true;
			} else {
				$data = array('libelle_circonscription' => $libelle_circonscription,
					'acronyme_circonscription' => $acronyme);
				$this->db->insert('circonscription', $data);
				return ($this->db->affected_rows() != 1) ? false : true;
			}

		}
		else{
			return false;
		}


	}

	public function list_circonscription(){
		$libelle_circonscription = trim($this->input->post('nom_circo'));

		if(!empty($libelle_service)){
			$sql = "SELECT c.id_circonscription, c.libelle_circonscription, c.acronyme_circonscription, s.libelle_service FROM
		 circonscription c LEFT JOIN service s ON c.id_service = s.id_service WHERE c.libelle_circonscription = ?";
			$query =  $this->db->query($sql, array($libelle_circonscription));
			return $query->result();
		}else{
			$sql = "SELECT c.id_circonscription, c.libelle_circonscription, c.acronyme_circonscription, s.libelle_service FROM
		 circonscription c LEFT JOIN service s ON c.id_service = s.id_service";
			$query =  $this->db->query($sql);
			return $query->result();
		}
	}

	public function update_circonscription(){

		$libelle_circonscription = trim($this->input->post('nom_circo'));
		$acronyme_circonscription = trim($this->input->post('acronyme'));
		$id_service = trim($this->input->post('service'));

		//$data = array('libelle_type_utilisateur' => $libelle_type_utilisateur);
		$id = trim($this->input->post('id'));


		if(!empty($libelle_circonscription) and !empty($acronyme_circonscription)){
			if(empty($id_service)){
				$sql = "UPDATE circonscription SET libelle_circonscription = ?, acronyme_circonscription = ? WHERE id_circonscription = ?";
				$this->db->query($sql, array($libelle_circonscription,$acronyme_circonscription , $id));
				return ($this->db->affected_rows() != 1) ? false : true;
			}else{
				$sql = "UPDATE circonscription SET libelle_circonscription = ?, acronyme_circonscription = ?, id_service = ? WHERE id_circonscription = ?";
				$this->db->query($sql, array($libelle_circonscription,$acronyme_circonscription, $id_service , $id));
				return ($this->db->affected_rows() != 1) ? false : true;
			}

		}else{
			return false;
		}
	}

	public function get_circonscription_by_id($id){
		if(!empty($id)){
			return $this->db->select(array('id_circonscription','libelle_circonscription', 'acronyme_circonscription', 'id_service'))
				->from('circonscription')
				->where('id_circonscription', $id)
				->get()
				->result();
		}
	}

	public function delete_one($id){
		if(!empty($id)){
			$sql = "DELETE FROM circonscription WHERE id_circonscription = ?";
			$this->db->query($sql,array($id));
		}
	}

}




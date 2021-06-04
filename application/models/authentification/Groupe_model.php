<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groupe_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function insert_group(){
		$libelle_type_utilisateur = trim($this->input->post('groupe'));
		if (!empty($libelle_type_utilisateur)){
			$data = array('libelle_type_utilisateur' => $libelle_type_utilisateur);
			$this->db->insert('type_utilisateur', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		else{
			return false;
		}


	}

	public function list_group(){
		$libelle_type_utilisateur = trim($this->input->post('groupe'));

		if(!empty($libelle_type_utilisateur)){
			return $this->db->select(array('idtype_utilisateur','libelle_type_utilisateur'))
							->from('type_utilisateur')
							->where('libelle_type_utilisateur', $libelle_type_utilisateur)
							->order_by('idtype_utilisateur', 'desc')
							->get()
							->result();
		}else{
			return $this->db->select(array('idtype_utilisateur','libelle_type_utilisateur'))
				->from('type_utilisateur')
				->order_by('idtype_utilisateur', 'desc')
				->get()
				->result();
		}
	}

	public function update_group(){

		$libelle_type_utilisateur = trim($this->input->post('groupe'));

		//$data = array('libelle_type_utilisateur' => $libelle_type_utilisateur);
		$id = trim($this->input->post('id'));


		if(!empty($libelle_type_utilisateur)){
			$sql = "UPDATE type_utilisateur SET libelle_type_utilisateur = ? WHERE idtype_utilisateur = ?";
			$this->db->query($sql, array($libelle_type_utilisateur, $id));
			/*$this->db->set('libelle_type_utilisateur', $libelle_type_utilisateur)
				->where('idtype_utilisateur', $id)
				->update('type_utilisateur');*/

			return ($this->db->affected_rows() != 1) ? false : true;
		}else{
			return false;
		}
	}

	public function get_group_by_id($id){
		if(!empty($id)){
			return $this->db->select(array('idtype_utilisateur','libelle_type_utilisateur'))
				->from('type_utilisateur')
				->where('idtype_utilisateur', $id)
				->get()
				->result();
		}
	}

	public function delete_one($id){
		if(!empty($id)){
			$sql = "DELETE FROM type_utilisateur WHERE idtype_utilisateur = ?";
			$this->db->query($sql,array($id));
		}
	}

}



<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groupe_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function insert_group(){
		$libelle_type_utilisateur = trim(xss_clean($this->input->post('groupe')));
		if (!empty($libelle_type_utilisateur)){
			$data = array('labeltype' => $libelle_type_utilisateur);
			$this->db->insert('typeutilisateur', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		else{
			return false;
		}


	}

	public function list_group(){
		$libelle_type_utilisateur = trim(xss_clean($this->input->post('groupe')));

		if(!empty($libelle_type_utilisateur)){
			return $this->db->select(array('idtypeuser','labeltype'))
							->from('typeutilisateur')
							->where('labeltype', $libelle_type_utilisateur)
							->order_by('idtypeuser', 'asc')
							->get()
							->result();
		}else{
			return $this->db->select(array('idtypeuser','labeltype'))
				->from('typeutilisateur')
				->order_by('idtypeuser', 'asc')
				->get()
				->result();
		}
	}

	public function update_group(){

		$libelle_type_utilisateur = trim(xss_clean($this->input->post('groupe')));

		//$data = array('libelle_type_utilisateur' => $libelle_type_utilisateur);
		$id = trim($this->input->post('id'));


		if(!empty($libelle_type_utilisateur)){
			$sql = "UPDATE typeutilisateur SET labeltype = ? WHERE idtypeuser = ?";
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
			return $this->db->select(array('idtypeuser','labeltype'))
				->from('typeutilisateur')
				->where('idtypeuser', $id)
				->get()
				->result();
		}
	}

	public function delete_one($id){
		if(!empty($id)){
			$sql = "DELETE FROM typeutilisateur WHERE idtypeuser = ?";
			$this->db->query($sql,array($id));
		}
	}

}



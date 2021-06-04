<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direction_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function insert_direction(){
		$libelle_direction = trim($this->input->post('nom_direction'));
		$acronyme = trim($this->input->post('acronyme'));
		if (!empty($libelle_direction) and !empty($acronyme)){
			$data = array('libelle_direction' => $libelle_direction,
				'acronyme_direction' => $acronyme);
			$this->db->insert('direction', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		else{
			return false;
		}


	}

	public function list_direction(){
		$libelle_direction = trim($this->input->post('nom_direction'));

		if(!empty($libelle_direction)){
			return $this->db->select(array('id_direction','libelle_direction', 'acronyme_direction'))
							->from('direction')
							->where('libelle_direction', $libelle_direction)
							->order_by('id_direction', 'desc')
							->get()
							->result();
		}else{
			return $this->db->select(array('id_direction','libelle_direction', 'acronyme_direction'))
				->from('direction')
				->order_by('id_direction', 'desc')
				->get()
				->result();
		}
	}

	public function update_direction(){

		$libelle_direction = trim($this->input->post('nom_direction'));
		$acronyme_direction = trim($this->input->post('acronyme'));

		//$data = array('libelle_type_utilisateur' => $libelle_type_utilisateur);
		$id = trim($this->input->post('id'));


		if(!empty($libelle_direction) and !empty($acronyme_direction)){
			$sql = "UPDATE direction SET libelle_direction = ?, acronyme_direction = ? WHERE id_direction = ?";
			$this->db->query($sql, array($libelle_direction,$acronyme_direction , $id));
			/*$this->db->set('libelle_type_utilisateur', $libelle_type_utilisateur)
				->where('idtype_utilisateur', $id)
				->update('type_utilisateur');*/

			return ($this->db->affected_rows() != 1) ? false : true;
		}else{
			return false;
		}
	}

	public function get_direction_by_id($id){
		if(!empty($id)){
			return $this->db->select(array('id_direction','libelle_direction', 'acronyme_direction'))
				->from('direction')
				->where('id_direction', $id)
				->get()
				->result();
		}
	}

	public function delete_one($id){
		if(!empty($id)){
			$sql = "DELETE FROM direction WHERE id_direction = ?";
			$this->db->query($sql,array($id));
		}
	}

}



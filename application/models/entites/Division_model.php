<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function insert_division(){
		$libelle_division = trim($this->input->post('nom_division'));
		$acronyme = trim($this->input->post('acronyme'));
		$id_service = trim($this->input->post('service'));
		$id_direction = trim($this->input->post('direction'));
		$rattachement = trim($this->input->post('rattachement'));

		if (!empty($libelle_division) and !empty($acronyme)){
			if ($rattachement == "service"){
				if (!empty($id_service)){
					$data = array('libelle_division' => $libelle_division,
						'acronyme_division' => $acronyme,
						'rattachement' => $rattachement,
						'id_service' => $id_service);
					$this->db->insert('division', $data);
					return ($this->db->affected_rows() != 1) ? false : true;
				} else {
					$data = array('libelle_division' => $libelle_division,
						'acronyme_division' => $acronyme,
						'rattachement' => $rattachement);
					$this->db->insert('division', $data);
					return ($this->db->affected_rows() != 1) ? false : true;
				}
			}
			if ($rattachement == "direction"){
				if (!empty($id_direction)){
					$data = array('libelle_division' => $libelle_division,
						'acronyme_division' => $acronyme,
						'rattachement' => $rattachement,
						'id_direction' => $id_direction);
					$this->db->insert('division', $data);
					return ($this->db->affected_rows() != 1) ? false : true;
				} else {
					$data = array('libelle_division' => $libelle_division,
						'acronyme_division' => $acronyme,
						'rattachement' => $rattachement);
					$this->db->insert('division', $data);
					return ($this->db->affected_rows() != 1) ? false : true;
				}
			}


		}
		else{
			return false;
		}


	}

	public function list_division(){
		$libelle_division = trim($this->input->post('nom_division'));

		if(!empty($libelle_division)){
			$sql = "(SELECT DISTINCT d.id_division, d.libelle_division, d.acronyme_division, d.rattachement,s.libelle_service AS entite_rattachee FROM
		 division d INNER JOIN service s ON d.id_service = s.id_service WHERE d.libelle_division = ? AND d.rattachement = 'service') UNION (SELECT di.id_division, di.libelle_division, di.acronyme_division, di.rattachement,dir.libelle_direction AS entite_rattachee FROM
		 division di INNER JOIN direction dir ON di.id_direction = dir.id_direction WHERE di.libelle_division = ? AND di.rattachement = 'direction')";
			$query =  $this->db->query($sql, array($libelle_division, $libelle_division));
			return $query->result();
		}else{
			$sql = "(SELECT d.id_division, d.libelle_division, d.acronyme_division, d.rattachement,s.libelle_service AS entite_rattachee FROM
		 division d INNER JOIN service s ON d.id_service = s.id_service WHERE d.rattachement = 'service') UNION (SELECT di.id_division, di.libelle_division, di.acronyme_division, di.rattachement,dir.libelle_direction AS entite_rattachee FROM
		 division di INNER JOIN direction dir ON di.id_direction = dir.id_direction WHERE di.rattachement = 'direction')";
			$query =  $this->db->query($sql);
			return $query->result();
		}
	}

	public function update_division(){

		$libelle_division = trim($this->input->post('nom_division'));
		$acronyme = trim($this->input->post('acronyme'));
		$id_service = trim($this->input->post('service'));
		$id_direction = trim($this->input->post('direction'));
		$rattachement = trim($this->input->post('rattachement'));

		//$data = array('libelle_type_utilisateur' => $libelle_type_utilisateur);
		$id = trim($this->input->post('id'));

		if (!empty($libelle_division) and !empty($acronyme)){
			if ($rattachement == "service"){
				if (!empty($id_service)){
					$sql = "UPDATE division SET libelle_division = ?, acronyme_division = ?, rattachement = ?, id_service = ? WHERE id_division = ?";
					$this->db->query($sql, array($libelle_division,$acronyme, $rattachement, $id_service , $id));
					return ($this->db->affected_rows() != 1) ? false : true;
				} else {
					$sql = "UPDATE division SET libelle_division = ?, acronyme_division = ?, rattachement = ? WHERE id_division = ?";
					$this->db->query($sql, array($libelle_division,$acronyme, $rattachement , $id));
					return ($this->db->affected_rows() != 1) ? false : true;
				}
			}
			if ($rattachement == "direction"){
				if (!empty($id_direction)){
					$sql = "UPDATE division SET libelle_division = ?, acronyme_division = ?, rattachement = ?, id_direction = ? WHERE id_division = ?";
					$this->db->query($sql, array($libelle_division,$acronyme, $rattachement, $id_direction , $id));
					return ($this->db->affected_rows() != 1) ? false : true;
				} else {
					$sql = "UPDATE division SET libelle_division = ?, acronyme_division = ?, rattachement = ? WHERE id_division = ?";
					$this->db->query($sql, array($libelle_division,$acronyme, $rattachement, $id));
					return ($this->db->affected_rows() != 1) ? false : true;
				}
			}


		}
		else{
			return false;
		}

	}

	public function get_division_by_id($id){
		if(!empty($id)){
			return $this->db->select(array('id_division','libelle_division', 'acronyme_division', 'rattachement','id_service', 'id_direction'))
				->from('division')
				->where('id_division', $id)
				->get()
				->result();
		}
	}

	public function delete_one($id){
		if(!empty($id)){
			$sql = "DELETE FROM division WHERE id_division = ?";
			$this->db->query($sql,array($id));
		}
	}

}




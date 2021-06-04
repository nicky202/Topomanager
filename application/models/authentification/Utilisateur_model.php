<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function commit_inscription(){
		$data = array();
		$data['nom'] = trim($this->input->post('nom'));
		$data['prenom'] = trim($this->input->post('prenom'));
		$data['email'] = trim($this->input->post('email'));
		$data['login'] = trim($this->input->post('login'));
		$data['mdp'] = trim($this->input->post('mdp'));
		$data['mdp_confirm'] = trim($this->input->post('mdp_confirm'));
		$data['groupe_id'] = trim($this->input->post('groupe_select'));

		$data = array('nom' => $data['nom'],
			'prenom' => $data['prenom'],
			'e_mail' => $data['email'],
			'login' => $data['login'],
			'mdp' => $data['mdp'] ,
			'valide' => 0,
			'id_type_utilisateur' => $data['groupe_id']);
		$this->db->insert('utilisateur', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function list_utilisateur()
	{
		$sql = "SELECT u.id_utilisateur, u.nom, u.prenom, u.e_mail, u.login, u.valide, t.libelle_type_utilisateur FROM
		 utilisateur u INNER JOIN type_utilisateur t ON u.id_type_utilisateur = t.idtype_utilisateur";
		$query =  $this->db->query($sql);
		return $query->result();
	}

	public function validate_sign_up($state=0, $id=null){
		if (isset($id)){
			$sql = "UPDATE utilisateur SET valide = ? WHERE id_utilisateur = ?";
			$this->db->query($sql, array($state, $id));
			return ($this->db->affected_rows() != 1) ? false : true;
		}
	}

	public function get_elt_for_login()
	{
		$login = trim($this->input->post('login'));
		$password = trim($this->input->post('password'));
		$sql = "SELECT u.login, u.mdp, u.valide, t.libelle_type_utilisateur FROM
		 utilisateur u INNER JOIN type_utilisateur t ON u.id_type_utilisateur = t.idtype_utilisateur WHERE u.login = ? AND u.mdp = ?";
		$query = $this->db->query($sql, array($login,$password));
		return $query->result();
	}

}

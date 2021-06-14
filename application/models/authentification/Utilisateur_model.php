<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function commit_inscription(){
		$data = array();
		$data['nom'] = trim(xss_clean($this->input->post('nom')));
		$data['prenoms'] = trim(xss_clean($this->input->post('prenoms')));
		$data['mail'] = trim(xss_clean($this->input->post('mail')));
		$data['login'] = trim(xss_clean($this->input->post('login')));
                $data['cin'] = xss_clean(trim($this->input->post('cin')));
                $data['tel'] = xss_clean(trim($this->input->post('tel')));
		$data['password'] = trim(xss_clean($this->input->post('password')));
		$password_confirm = trim(xss_clean($this->input->post('password_confirm')));
                
		$data['id_type_utilisateur'] = trim(xss_clean($this->input->post('groupe_select')));
                //repetition mdp à vérifier par js
                $salt = 'Suivi_T0p0*';
                $data['crypt'] = crypt($data['password'], $salt);

		
		
		$uploadimg = array(

			'upload_path' => './profile_img',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => 4000
		);

		$this->load->library("upload",$uploadimg);

		if(!$this->upload->do_upload('photo')){

			echo $this->upload->display_errors();
		}
		else{ 
			if($data['password'] == $password_confirm){
				$profil= $this->upload->data();
				$data['photo']=$profil['file_name'];
				$data = array('nom' => $data['nom'],
				'prenoms' => $data['prenoms'],
				'mail' => $data['mail'],
				'login' => $data['login'],
				'password' => $data['crypt'] ,
				'valide' => 0,
				'id_type_utilisateur' => $data['id_type_utilisateur'],
				'cin' => $data['cin'],
				'tel' => $data['tel'],
				'photo' => $data['photo']		
			);
			$this->db->insert('utilisateur', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
			}
		}
		
	}

	public function list_utilisateur()
	{
		$sql = "SELECT u.idutilisateur, u.nom, u.prenoms, u.mail, u.login, u.valide, u.cin, u.tel, t.labeltype FROM
		 utilisateur u INNER JOIN typeutilisateur t ON u.id_type_utilisateur = t.idtypeuser";
		$query =  $this->db->query($sql);
		return $query->result();
	}

	public function validate_sign_up($state=0, $id=null){
		if (isset($id)){
			$sql = "UPDATE utilisateur SET valide = ? WHERE idutilisateur = ?";
			$this->db->query($sql, array($state, $id));
			return ($this->db->affected_rows() != 1) ? false : true;
		}
	}

	public function get_elt_for_login()
	{
		$login = xss_clean(trim($this->input->post('login')));
		$password = xss_clean(trim($this->input->post('password')));
                $salt = 'Suivi_T0p0*';
                $cypted_password = crypt($password, $salt);
                //var_dump($cypted_password);
		$sql = "SELECT u.idutilisateur, u.nom, u.prenoms, u.mail, u.login, u.valide, u.cin, u.tel, u.photo, t.labeltype FROM
		 utilisateur u INNER JOIN typeutilisateur t ON u.id_type_utilisateur = t.idtypeuser WHERE u.login = ? AND u.password = ?";
		$query = $this->db->query($sql, array($login,$cypted_password));
		return $query->result();
	}

	public function fetch_data(){
		$query = $this->db->get("utilisateur ");
		return $query->result();
	}

}


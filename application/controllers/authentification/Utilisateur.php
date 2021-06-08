<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
		$this->load->helper("form");
                $this->load->helper("security");
		$this->load->model("/authentification/Groupe_model", "groupemodel");
		$this->load->model('/authentification/Utilisateur_model', "usermodel");
	}
        public function index(){
            $this->login();
        }

	public function login(){

		$this->load->view('authentification/login');
	}

	public function inscription(){
		$result = $this->groupemodel->list_group();
		$this->load->view('templates/header_inscription');
		$data = array();
		if ($result){
			$data['result'] = $result;
			$this->load->view('authentification/inscription', $data);
		}
		$this->load->view('templates/footer_inscription');
	}

	public function commit_inscription(){
		$query = $this->usermodel->commit_inscription();
		$data = array();
		$data['success'] = $query;
		if($query)
			$this->load->view('authentification/login', $data);
	}

	public function list_utilisateur(){
            if($this->session->has_userdata('login')){
		$res = $this->usermodel->list_utilisateur();
		$data = array();
		$data['res'] = $res;
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('authentification/list_utilisateur', $data);
		$this->load->view('templates/scripts');
            }else{
                redirect('login');
            }

	}

	//Valider ou devalider une incription
	public function change_state_signup($state=0, $id = null){
            if($this->session->has_userdata('login')){
		$query = $this->usermodel->validate_sign_up($state, $id);
		redirect('list_user', 'refresh');
            }else{
                redirect('login');
            }
	}

	public function check_login(){
		$res = $this->usermodel->get_elt_for_login();
		$data = array();
		if (empty($res))
		{
			$data['info'] = "Le mot de passe ou le login est incorrecte... Veuillez vérifier SVP!";
			$this->load->view('authentification/login', $data);
		}else{
			foreach ($res as $row){
				if ($row->valide == 0){
					$data["info"] = "Votre compte n'a pas encore été activé ou a été désactivé par l'administrateur.";
					$this->load->view('authentification/login', $data);
				}else{
					$this->session->set_userdata('login', $row->login);
					$this->session->set_userdata('groupe', $row->libelle_type_utilisateur);
					redirect('dashboard', 'refresh');
				}
			}
		}

	}

	public function deconnexion()
	{
            if($this->session->has_userdata('login')){
		$this->session->sess_destroy();
		redirect('login', 'refresh');
            }else{
                redirect('login');
            }
	}
}

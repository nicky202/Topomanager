<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groupe extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
		$this->load->helper('form');
                $this->load->helper('security');
		$this->load->model('authentification/Groupe_model', 'groupemodel');
	}

	public function new_group(){

		$query = $this->groupemodel->insert_group();
		$data['success'] = $query;

		if($query){
			redirect('list_group', 'refresh');
			//$this->load->view('authentification/edit_groupe', $data);
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('authentification/edit_groupe', $data);
			$this->load->view('templates/scripts');
		}
	}

	public function list_group($nom_groupe=null){
		$result = $this->groupemodel->list_group();
		if($result){
			$data['result'] = $result;
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('authentification/list_groupes', $data);
			$this->load->view('templates/scripts');
		}
	}

	public function edit_group($id=null){

		$result = $this->groupemodel->get_group_by_id($id);
		$data['result'] = $result;

		if($result){
			$data['result'] = $result;
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('authentification/edit_groupe', $data);
			$this->load->view('templates/scripts');

		}
	}

	public function delete_group($id=null){

		$this->groupemodel->delete_one($id);

		redirect('list_group', 'refresh');
	}

	public function update_group()
	{
		$query = $this->groupemodel->update_group();
		$data['success'] = $query;

		if($query){
			redirect('list_group', 'refresh');
			//$this->load->view('authentification/edit_groupe', $data);
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('authentification/edit_groupe', $data);
			$this->load->view('templates/scripts');
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
		$this->load->helper('form');
		$this->load->model('entites/Service_model', 'service_model');
		$this->load->model('entites/Direction_model', 'direction_model');
	}

	public function new_service(){
		$directions = $this->direction_model->list_direction();
		$query = $this->service_model->insert_service();
		$data['success'] = $query;
		$data['directions'] = $directions;

		if($query){
			redirect('/entites/service/list_service', 'refresh');
			//$this->load->view('authentification/edit_groupe', $data);
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_service', $data);
			$this->load->view('templates/scripts');
		}
	}

	public function list_service($nom_service=null){
		$result = $this->service_model->list_service();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		if($result){
			$data['result'] = $result;
			$this->load->view('entites/list_service', $data);
		}
		else{
			$this->load->view('entites/list_service');
		}
		$this->load->view('templates/scripts');
	}

	public function edit_service($id=null){
		$directions = $this->direction_model->list_direction();
		$result = $this->service_model->get_service_by_id($id);
		$data['result'] = $result;
		$data['directions'] = $directions;

		if($result){
			$data['result'] = $result;
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_service', $data);
			$this->load->view('templates/scripts');

		}
	}

	public function delete_service($id=null){

		$this->service_model->delete_one($id);

		redirect('/entites/service/list_service', 'refresh');
	}

	public function update_service()
	{
		$query = $this->service_model->update_service();
		$data['success'] = $query;

		if($query){
			redirect('/entites/service/list_service', 'refresh');
			//$this->load->view('authentification/edit_groupe', $data);
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_service', $data);
			$this->load->view('templates/scripts');
		}
	}
}


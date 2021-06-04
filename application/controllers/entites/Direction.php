<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direction extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
		$this->load->helper('form');
		$this->load->model('entites/Direction_model', 'direction_model');
	}

	public function new_direction(){

		$query = $this->direction_model->insert_direction();
		$data['success'] = $query;

		if($query){
			redirect('/entites/direction/list_direction', 'refresh');
			//$this->load->view('authentification/edit_groupe', $data);
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_direction', $data);
			$this->load->view('templates/scripts');
		}
	}

	public function list_direction($nom_direction=null){
		$result = $this->direction_model->list_direction();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		if($result){
			$data['result'] = $result;
			$this->load->view('entites/list_direction', $data);
		}
		else{
			$this->load->view('entites/list_direction');
		}
		$this->load->view('templates/scripts');
	}

	public function edit_direction($id=null){

		$result = $this->direction_model->get_direction_by_id($id);
		$data['result'] = $result;

		if($result){
			$data['result'] = $result;
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_direction', $data);
			$this->load->view('templates/scripts');

		}
	}

	public function delete_direction($id=null){

		$this->direction_model->delete_one($id);

		redirect('/entites/direction/list_direction', 'refresh');
	}

	public function update_direction()
	{
		$query = $this->direction_model->update_direction();
		$data['success'] = $query;

		if($query){
			redirect('/entites/direction/list_direction', 'refresh');
			//$this->load->view('authentification/edit_groupe', $data);
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_direction', $data);
			$this->load->view('templates/scripts');
		}
	}
}

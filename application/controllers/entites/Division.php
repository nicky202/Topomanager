<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
		$this->load->helper('form');
		$this->load->model('entites/Division_model', 'division_model');
		$this->load->model('entites/Service_model', 'service_model');
		$this->load->model('entites/Direction_model', 'direction_model');
	}

	public function new_division(){
            if($this->session->has_userdata('login')){
		$services = $this->service_model->list_service();
		$directions = $this->direction_model->list_direction();
		$query = $this->division_model->insert_division();
		$data['success'] = $query;
		$data['services'] = $services;
		$data['directions'] = $directions;

		if($query){
			redirect('/entites/division/list_division', 'refresh');
			//$this->load->view('authentification/edit_groupe', $data);
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_division', $data);
			$this->load->view('templates/scripts');
		}
            }else{
                redirect('login');
            }
	}

	public function list_division($nom_division=null){
            if($this->session->has_userdata('login')){
		$result = $this->division_model->list_division();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		if($result){
			$data['result'] = $result;
			$this->load->view('entites/list_division', $data);
		}
		else{
			$this->load->view('entites/list_division');
		}
		$this->load->view('templates/scripts');
            }else{
                redirect('login');
            }
	}

	public function edit_division($id=null){
            if($this->session->has_userdata('login')){
		$services = $this->service_model->list_service();
		$directions = $this->direction_model->list_direction();
		$result = $this->division_model->get_division_by_id($id);
		$data['result'] = $result;
		$data['services'] = $services;
		$data['directions'] = $directions;

		if($result){
			$data['result'] = $result;
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_division', $data);
			$this->load->view('templates/scripts');

		}
            }else{
                redirect('login');
            }
	}

	public function delete_division($id=null){
            if($this->session->has_userdata('login')){
		$this->division_model->delete_one($id);
		redirect('/entites/division/list_division', 'refresh');
            }else{
                redirect('login');
            }
	}

	public function update_division()
	{
            if($this->session->has_userdata('login')){
		$query = $this->division_model->update_division();
		$data['success'] = $query;

		if($query){
			redirect('/entites/division/list_division', 'refresh');
			//$this->load->view('authentification/edit_groupe', $data);
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_division', $data);
			$this->load->view('templates/scripts');
		}
            }else{
                redirect('login');
            }
        }
}



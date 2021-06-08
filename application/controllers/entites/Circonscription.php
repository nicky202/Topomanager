<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Circonscription extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
		$this->load->helper('form');
		$this->load->model('entites/Circonscription_model', 'circonscription_model');
		$this->load->model('entites/Service_model', 'service_model');
		$this->load->model('entites/Direction_model', 'direction_model');
	}

	public function new_circonscription(){
            if($this->session->has_userdata('login')){
		$services = $this->service_model->list_service();
		$query = $this->circonscription_model->insert_circonscription();
		$data['success'] = $query;
		$data['services'] = $services;

		if($query){
			redirect('/entites/circonscription/list_circonscription', 'refresh');
			//$this->load->view('authentification/edit_groupe', $data);
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_circonscription', $data);
			$this->load->view('templates/scripts');
		}
            }else{
                redirect('login');
            } 
	}

	public function list_circonscription($nom_service=null){
            if($this->session->has_userdata('login')){
		$result = $this->circonscription_model->list_circonscription();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		if($result){
			$data['result'] = $result;
			$this->load->view('entites/list_circonscription', $data);
		}
		else{
			$this->load->view('entites/list_circonscription');
		}
		$this->load->view('templates/scripts');
            }else{
                redirect('login');
            }
	}

	public function edit_circonscription($id=null){
            if($this->session->has_userdata('login')){
		$services = $this->service_model->list_service();
		$result = $this->circonscription_model->get_circonscription_by_id($id);
		$data['result'] = $result;
		$data['services'] = $services;

		if($result){
			$data['result'] = $result;
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_circonscription', $data);
			$this->load->view('templates/scripts');

		}
            }else{
                redirect('login');
            }
	}

	public function delete_circonscription($id=null){
            if($this->session->has_userdata('login')){
		$this->circonscription_model->delete_one($id);
		redirect('/entites/circonscription/list_circonscription', 'refresh');
            }else{
                redirect('login');
            }
	}

	public function update_circonscription()
	{
            if($this->session->has_userdata('login')){
		$query = $this->circonscription_model->update_circonscription();
		$data['success'] = $query;

		if($query){
			redirect('/entites/circonscription/list_circonscription', 'refresh');
			//$this->load->view('authentification/edit_groupe', $data);
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('entites/edit_circonscription', $data);
			$this->load->view('templates/scripts');
		}
            }else{
                redirect('login');
            }
	}
}



<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('setting_model');
    $this->load->model('mission_model');
  }

  public function index(){
    $this->middle = 'admin/settings/edit';
    $this->data['setting'] = $this->setting_model->get();
    $this->data['missions'] = $this->mission_model->get();
    $this->layout();
  }

  function update(){
    $data = array('office_address' => $this->input->post('office_address'),
      'office_phone' => $this->input->post('office_phone'),
      'workshop_address' => $this->input->post('workshop_address'),
      'workshop_phone' => $this->input->post('workshop_phone'),
      'email' => $this->input->post('email'),
      'visi' => $this->input->post('visi'),
      'misi' => $this->input->post('misi'));

    if($this->setting_model->update($data))
      $this->session->set_flashdata('message', "Update setting succeed");
    else
      $this->session->set_flashdata('message', "Update setting failed");

    redirect('admin/dashboard');
  }
}

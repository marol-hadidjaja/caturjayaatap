<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('slider_model');
  }

  public function index(){
    $this->middle = 'admin/sliders/index';
    $data = array();
    $this->data['slider'] = $this->slider_model->get();
    $this->layout();
  }

  public function edit($url){
    $this->middle = 'admin/pages/edit';
    $data = array();
    $data['page'] = $this->slider_model->get_pages($url);
    $data['url'] = $url;
    $this->data = $data;
    $this->layout();
  }

  public function update($url){
    $data = array('title' => $this->input->post('title'),
      'summary' => $this->input->post('summary'),
      'content' => $this->input->post('content'));
    if($this->slider_model->update_page($url, $data))
      $this->session->set_flashdata('message', "Update {$url} succeed");
    else
      $this->session->set_flashdata('message', "Update {$url} failed");

    redirect('admin/dashboard');
  }
}

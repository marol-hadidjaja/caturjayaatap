<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller{
  function __construct(){
    parent::__construct();

    if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
    $this->load->model('page_model');
  }

  public function edit($url){
    $this->middle = 'admin/pages/edit';
    $data = array();
    $data['page'] = $this->page_model->get_pages($url);
    $data['url'] = $url;
    $this->data = $data;
    $this->layout();
  }

  public function update($url){
    // $this->middle = 'admin/pages/edit';
    // $data = array();
    // echo "title: {$this->input->post('title')}";
    // echo "summary: {$this->input->post('summary')}";
    // $data['page'] = $this->page_model->get_pages($url);
    // $this->data = $data;
    // $this->layout();
    $data = array('title' => $this->input->post('title'),
      'summary' => $this->input->post('summary'),
      'content' => $this->input->post('content'));
    if($this->page_model->update_page($url, $data))
      $this->session->set_flashdata('message', "Update {$url} succeed");
    else
      $this->session->set_flashdata('message', "Update {$url} failed");

    redirect('admin/dashboard');
  }
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller{
  function __construct(){
    parent::__construct();

    if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
    $this->load->model('page_model');
  }

  public function index(){
      $this->middle = 'admin/pages/index'; // passing middle to function. change this for different views.
      $data = array();
      $data['pages'] = $this->page_model->get_pages();
      $this->data = $data;
      $this->layout();
  }
}

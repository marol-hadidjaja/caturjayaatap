<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('page_model');
  }

  public function index(){
    $this->middle = 'admin/pages/index';
    $this->data['pages'] = $this->page_model->get_pages();
    $this->data['title'] = 'CJA Admin - Pages';
    $this->layout();
  }
}

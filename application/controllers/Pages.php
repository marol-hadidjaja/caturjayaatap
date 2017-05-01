<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Public_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('page_model');
  }

  public function index(){
    $this->middle = 'index'; // passing middle to function. change this for different views.
    $data = array();
    $data['pages'] = $this->page_model->get_pages();
    $this->data = $data;
    $this->layout();
  }
}

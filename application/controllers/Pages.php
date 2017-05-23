<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Public_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('page_model');
    $this->load->model('product_model');
  }

  public function index(){
    $this->middle = 'index'; // passing middle to function. change this for different views.
    $data = array();
    $data['pages'] = $this->page_model->get_pages();
    $this->data['products'] = $this->product_model->get();
    $this->data = $data;
    $this->layout();
  }

  public function view($url){
    echo 'url---'.$url.'---<br/>';
    $this->data['page'] = $this->page_model->get_pages($url);
    if($this->data['page']){
      $this->data['pages'] = $this->page_model->get_pages();
      if($url == ''){
        echo 'index page<br/>';
        $this->data['products'] = $this->product_model->get();
        $this->middle = 'index';
      }
      else{
        echo 'not index page';
        $this->middle = $url;
      }
    }
    else
      $this->middle = 'error';

    $this->layout();
  }
}

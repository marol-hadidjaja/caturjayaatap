<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('product_model');
    $this->options_per = array("lembar", "unit", "batang");
    $this->options_specs_name = array("panjang", "lebar", "tebal", "tinggi");
    $this->options_specs_unit = array("in", "m", "cm", "mm");
  }

  // this function make user can access /admin/products/new
  public function _remap($method){
    if ($method === 'new'){
      $this->_new();
    }
    else{
      $this->default_method();
    }
  }

  public function index(){
    $this->middle = 'admin/products/index';
    $this->data['products'] = $this->product_model->get();
    $this->layout();
  }

  public function _new(){
    $this->middle = 'admin/products/new';
    $this->data["options_per"] = $this->options_per;
    $this->data["options_specs_name"] = $this->options_specs_name;
    $this->data["options_specs_unit"] = $this->options_specs_unit;
    $this->layout();
  }

  public function create(){
    $data = array('product' => array('name' => $this->input->post('name'),
      'price' => array(),
      'specifications' => array()));
    if($this->product_model->create($data))
      $this->session->set_flashdata('message', "Create product succeed");
    else
      $this->session->set_flashdata('message', "Create product failed");
  }

  public function edit($url){
    $this->middle = 'admin/products/edit';
    $this->data['page'] = $this->product_model->get($url);
    $this->data['url'] = $url;
    $this->layout();
  }

  public function update($url){
    $data = array('title' => $this->input->post('title'),
      'summary' => $this->input->post('summary'),
      'content' => $this->input->post('content'));
    if($this->product_model->update_page($url, $data))
      $this->session->set_flashdata('message', "Update {$url} succeed");
    else
      $this->session->set_flashdata('message', "Update {$url} failed");

    redirect('admin/dashboard');
  }
}

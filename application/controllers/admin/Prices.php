<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prices extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->options_per = array("lembar" => "lembar", "unit" => "unit", "batang" => "batang");
    $this->options_specs_name = array("panjang" => "panjang", "lebar" => "lebar", "tebal" => "tebal", "tinggi" => "tinggi");
    $this->options_specs_unit = array("in" => "in", "m" => "m", "cm" => "cm", "mm" => "mm");
  }

  // this function make user can access /admin/prices/new
  public function _remap($method){
    if ($method === 'new'){
      $this->_new();
    }
    else{
      $this->$method();
    }
  }

  public function _new(){
    $this->data["options_per"] = $this->options_per;
    $this->data["options_specs_name"] = $this->options_specs_name;
    $this->data["options_specs_unit"] = $this->options_specs_unit;
    $this->data["prices_count"] = (int)$this->input->get("prices_count") + 1;
    $this->data["specs_count"] = 0;
    $this->load->view('admin/prices/_form', $this->data);
    // $this->load->view('admin/prices/new', $this->data);
  }
}

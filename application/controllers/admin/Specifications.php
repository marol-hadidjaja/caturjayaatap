<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Specifications extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->options_per = array("lembar" => "lembar", "unit" => "unit", "batang" => "batang");
    $this->options_specs_name = array("panjang", "lebar", "tebal", "tinggi");
    $this->options_specs_unit = array("in", "m", "cm", "mm");
  }

  // this function make user can access /admin/specifications/new
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
    $this->load->view('admin/specifications/new', $this->data);
  }
}

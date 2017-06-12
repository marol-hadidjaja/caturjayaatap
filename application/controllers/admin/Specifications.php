<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Specifications extends Admin_Controller{
  function __construct(){
    parent::__construct();

    /*
    $this->options_per = array("Choose your type" => "", "lembar" => "lembar", "unit" => "unit", "batang" => "batang");
    $this->options_specs_name = array("Choose your spec" => "", "panjang" => "panjang", "lebar" => "lebar", "tebal" => "tebal", "tinggi" => "tinggi");
    $this->options_specs_unit = array("Choose your size" => "", "in" => "Inchi - in", "m" => "Meter - m", "cm" => "Centimeter - cm", "mm" => "Milimeter - mm");
     */
    $this->options_per = array("" => "Choose your type", "lbr" => "lembar", "unit" => "unit", "btg" => "batang");
    $this->options_specs_name = array("" => "Choose your spec", "panjang" => "panjang", "lebar" => "lebar", "tebal" => "tebal", "tinggi" => "tinggi");
    $this->options_specs_unit = array("" => "Choose your size", "in" => "Inchi - in", "m" => "Meter - m", "cm" => "Centimeter - cm", "mm" => "Milimeter - mm");
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
    $this->data["prices_count"] = $this->input->get("prices_count");
    $this->data["specs_count"] = (int)$this->input->get("specs_count") + 1;
    $this->load->view('admin/specifications/_form', $this->data);
    // $this->load->view('admin/specifications/new', $this->data);
  }
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Missions extends Admin_Controller{
  function __construct(){
    parent::__construct();
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
    $this->data["missions_count"] = (int)$this->input->get("missions_count") + 1;
    $this->load->view('admin/missions/_form', $this->data);
  }
}

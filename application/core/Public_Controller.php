<?php
class Public_Controller extends MY_Controller{
  function __construct(){
    parent::__construct();
    // echo 'This is from public controller';
  }

  var $template  = array();
  var $data      = array();
  public function layout(){
    // making template and send data to view.
    $this->template['header'] = $this->load->view('layout/header', $this->data, true);
    $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
    $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
    $this->load->view('layout/index', $this->template);
  }
}

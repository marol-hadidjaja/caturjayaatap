<?php

class Admin_Controller extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    echo 'This is from admin controller';
    $this->load->add_package_path(APPPATH.'libraries/third_party/ion_auth/');
		$this->load->library('ion_auth');
  }

  var $template  = array();
  var $data      = array();
  public function layout(){
     // making temlate and send data to view.
     $this->template['header'] = $this->load->view('admin/layout/header', $this->data, true);
     $this->template['left']   = $this->load->view('admin/layout/left', $this->data, true);
     $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
     $this->template['footer'] = $this->load->view('admin/layout/footer', $this->data, true);
     // $this->load->view('layout/index', $this->template);
     $this->load->view('admin/layout/index', $this->template);
  }
}

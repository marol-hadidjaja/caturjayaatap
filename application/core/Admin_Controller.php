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
}

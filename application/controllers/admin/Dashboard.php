<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
    else
      $this->load->view('admin/dashboard_view');
  }
}

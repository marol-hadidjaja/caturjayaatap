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
    else{
      $this->middle = 'admin/home'; // passing middle to function. change this for different views.
      $this->layout();
      // $this->load->view('admin/dashboard_view');
    }
  }
}

<?php
class Public_Controller extends MY_Controller{
  function __construct(){
    parent::__construct();
    // echo 'This is from public controller';
  }

  var $template  = array();
  var $data      = array();

  public function default_vars(){
    $latest_products = $this->product_model->get();

    foreach($latest_products as $idx => $product){
      $latest_products[$idx]['images'] = $this->product_image_model->get($product['id']);
    }
    $this->data['latest_products'] = $latest_products;

    $this->data['setting'] = $this->setting_model->get();
    $this->data['pages'] = $this->page_model->get_pages();
  }

  public function layout(){
    // making template and send data to view.
    $this->template['header'] = $this->load->view('layout/header', $this->data, true);
    $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
    $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
    $this->load->view('layout/index', $this->template);
  }
}

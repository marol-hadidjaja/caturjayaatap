<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Public_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('page_model');
    $this->load->model('product_model');
    $this->load->model('slider_model');
    $this->load->model('setting_model');
    $this->load->model('mission_model');
  }

  public function detail($id){
    $this->default_vars();
    $this->data['id'] = $id;
    // $this->data['product'] = $this->product_model->get($id);
    $this->data['category'] = $this->category_model->find_by_id($id);
    $this->data['products'] = $this->product_model->get_by_category($id);
    $this->data['images'] = $this->product_image_model->get($id);
    // $this->middle = 'detail_product';
    $this->middle = 'detail_product_new';
    $this->layout();
  }
}

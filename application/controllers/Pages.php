<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Public_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('page_model');
    $this->load->model('product_model');
    $this->load->model('slider_model');
    $this->load->model('setting_model');
  }

  public function index(){
    $this->middle = 'index'; // passing middle to function. change this for different views.
    $data = array();
    $this->data['pages'] = $this->page_model->get_pages();
    $this->data['sliders'] = $this->slider_model->get();
    $featured_products = $this->product_model->get_featured(3);

    foreach($featured_products as $idx => $product){
      $featured_products[$idx]['images'] = $this->product_image_model->get($product['id']);
    }
    $this->data['featured_products'] = $featured_products;

    $latest_products = $this->product_model->get();

    foreach($latest_products as $idx => $product){
      $latest_products[$idx]['images'] = $this->product_image_model->get($product['id']);
    }
    $this->data['latest_products'] = $latest_products;

    $this->data['setting'] = $this->setting_model->get();
    $this->layout();
  }

  public function view($url){
    echo 'url---'.$url.'---<br/>';
    $this->data['page'] = $this->page_model->get_pages($url);
    if($this->data['page']){
      echo "PAGE IS HERE<br/>";
      $this->data['pages'] = $this->page_model->get_pages();
      print_r($this->data['pages']);
      if($url == ''){
        echo 'index page<br/>';
        $this->data['products'] = $this->product_model->get();
        $this->middle = 'index';
      }
      else{
        echo 'not index page';
        $this->middle = $url;
      }
    }
    else
      $this->middle = 'error';

    $this->layout();
  }
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Public_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('page_model');
    $this->load->model('product_model');
    $this->load->model('category_model');
    $this->load->model('slider_model');
    $this->load->model('setting_model');
    $this->load->model('mission_model');
  }

  public function index(){
    $this->default_vars();
    $this->middle = 'index'; // passing middle to function. change this for different views.

    $this->data['page'] = $this->page_model->get_pages('');
    $this->data['sliders'] = $this->slider_model->get();
    $featured_products = $this->product_model->get_featured(3);

    if(count($featured_products) < 0){
      foreach($featured_products as $idx => $product){
        $featured_products[$idx]['images'] = $this->product_image_model->get($product['id']);
      }
      $this->data['featured_products'] = $featured_products;
    }
    else{
      $this->data['featured_products'] = array_slice($this->data['latest_products'], 0, 3);
    }

    $this->layout();
  }

  public function view($url){
    $this->default_vars();
    $this->data['page'] = $this->page_model->get_pages($url);
    if($this->data['page']){
      if($url == ''){
        $this->middle = 'index';
      }
      else{
        $this->middle = $url;
        if($url == 'about'){
          $this->data['missions'] = $this->mission_model->get();
        }
        else if($url == 'products'){
          $products = $this->product_model->get();
          if(count($products) > 0){
            foreach($products as $idx => $product){
              $products[$idx]['images'] = $this->product_image_model->get($product['id']);
            }
            $this->data['products'] = $products;
          }

          $categories = $this->category_model->get();
          if(count($categories) > 0){
            foreach($categories as $idx => $category){
              $categories[$idx]['images'] = $this->product_image_model->get($category['id']);
              // print_r($categories[$idx]);
            }
            $this->data['categories'] = $categories;
          }
        }
      }
    }
    else{
      if($url == 'phpinfo')
        $this->middle = 'phpinfo';
      else
        $this->middle = 'error';
    }

    $this->layout();
  }
}

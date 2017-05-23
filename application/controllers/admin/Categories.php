<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('category_model');
  }

  public function index(){
    $term = $this->input->get('term');
    $categories = $this->category_model->search($term);
    $categories_res = array();
    foreach($categories as $key=>$category){
      array_push($categories_res, array('id' => (string)$category['id'], 'text' => $category['name']));
    }
    echo json_encode($categories_res);
  }
}

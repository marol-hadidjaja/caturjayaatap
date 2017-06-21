<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('category_model');
    $this->load->model('product_image_model');
    $this->load->model('product_model');
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

  public function edit($id){
    $this->middle = 'admin/categories/edit';
    $this->data['category'] = $this->category_model->find_by_id($id);
    $this->data['products'] = $this->product_model->get_by_category($id);
    $this->data['images'] = $this->product_image_model->get($id);
    $this->data['title'] = 'CJA Admin - Products in '.$this->data['category']['name'];

    $this->layout();
  }

  public function create(){
    if($category_id = $this->category_model->create($this->input->post('category'))){
      $this->session->set_flashdata('message_success', "Create category succeed");
      redirect('admin/categories/edit/'.$category_id);
    }
    else{
      $this->session->set_flashdata('message_fail', "Create category failed");
      redirect('admin/products/');
    }

  }
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('product_model');

    $this->options_per = array("lembar" => "lembar", "unit" => "unit", "batang" => "batang");
    $this->options_specs_name = array("panjang" => "panjang", "lebar" => "lebar", "tebal" => "tebal", "tinggi" => "tinggi");
    $this->options_specs_unit = array("in" => "in", "m" => "m", "cm" => "cm", "mm" => "mm");
  }

  // this function make user can access /admin/products/new
  public function _remap($method, $params = array()){
    if ($method === 'new'){
      $this->_new();
    }
    else{
      $this->$method($params);
    }
  }

  public function index(){
    $this->middle = 'admin/products/index';
    $this->data['products'] = $this->product_model->get();
    $this->layout();
  }

  public function _new(){
    $this->middle = 'admin/products/new';
    $this->data["options_per"] = $this->options_per;
    $this->data["options_specs_name"] = $this->options_specs_name;
    $this->data["options_specs_unit"] = $this->options_specs_unit;
    $this->data["prices_count"] = 0;
    $this->data["specs_count"] = 0;
    $this->layout();
  }

  public function create(){
    print_r($this->input->post());
    /*
      Array ( [name] => pagar galvanize
      [prices] => Array ( [1] => Array ( [price] => 240000
                                         [per] => lembar
                                         [specifications] => Array ( [1] => Array ( [name] => lebar
                                                                                    [measurement] => 240
                                                                                    [unit] => in )
                                                                     [0] => Array ( [name] => panjang
                                                                                    [measurement] => 240
                                                                                    [unit] => in ) ) )
        [0] => Array ( [price] => 195000
                       [per] => lembar
                       [specifications] => Array ( [1] => Array ( [name] => lebar
                                                                  [measurement] => 120
                                                                  [unit] => in )
                                                   [0] => Array ( [name] => panjang
                                                                  [measurement] => 240
                                                                  [unit] => in ) ) ) ) [btn_save] => Save )
    */
    $data = array('product' => array('name' => $this->input->post('name')),
      'prices' => $this->input->post('prices'));
    if($this->product_model->create($data))
      $this->session->set_flashdata('message', "Create product succeed");
    else
      $this->session->set_flashdata('message', "Create product failed");

    redirect('admin/products');
  }

  public function edit($params){
    $this->middle = 'admin/products/edit';
    $product = $this->product_model->get($params[0]);
    $this->data["product"] = $product["product"];
    $prices = array();
    foreach($product['prices'] as $key => $item){
      $allowed = array('price_id', 'price', 'per');
      if(!isset($prices[$item['price_id']]))
        $prices[$item['price_id']] = array_intersect_key($item, array_flip($allowed));
      // echo "before - prices[price_id] - {$item['price_id']}: ";
      // print_r($prices[$item['price_id']]);
      // echo "<br/>";
      if(!isset($prices[$item['price_id']]['specifications']))
        $prices[$item['price_id']]['specifications'] = array();

      $allowed = array('name', 'measurement', 'unit');
      $spec = array_intersect_key($item, array_flip($allowed));
      array_push($prices[$item['price_id']]['specifications'], $spec);
      // echo "after - prices[price_id] - {$item['price_id']}: ";
      // print_r($prices[$item['price_id']]);
      // echo "<hr/>";
    }
    $this->data["prices"] = $prices;
    $this->data["id"] = $params[0];
    $this->data["options_per"] = $this->options_per;
    $this->data["options_specs_name"] = $this->options_specs_name;
    $this->data["options_specs_unit"] = $this->options_specs_unit;
    // $this->data["prices_count"] = $product["prices_count"];
    // $this->data["specs_count"] = $product["specs_count"];
    $this->layout();
  }

  public function update($url){
    $data = array('title' => $this->input->post('title'),
      'summary' => $this->input->post('summary'),
      'content' => $this->input->post('content'));
    if($this->product_model->update_page($url, $data))
      $this->session->set_flashdata('message', "Update {$url} succeed");
    else
      $this->session->set_flashdata('message', "Update {$url} failed");

    redirect('admin/dashboard');
  }
}

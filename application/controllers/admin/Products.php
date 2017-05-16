<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_Controller{

   //variable for storing error message
    private $error;
    //variable for storing success message
    private $success;
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
    // echo "<pre>";
    // print_r($product['prices']);
    // echo "</pre>";
    // echo "<br/>";
    $prices = array();
    $count_price = 0;
    $count_spec = 0;
    foreach($product['prices'] as $key => $item){
      // echo "key price: {$key}<br/>";
      /*
      $price_id = $item['price_id'];

      $allowed = array('price_id', 'price', 'per');
      if($key == 0)
        $prices[$count_price] = array_intersect_key($item, array_flip($allowed));

      // echo "-------------filtering price_id<br/>";
      $help = array_filter($prices, function($v) use(&$item){
        // echo "-----v: ";
        // print_r($v);
        // echo "-----item: ";
        // print_r($item);
        // echo "<br/>";
        return $v['price_id'] == $item['price_id'];
      });
      // echo "length for found price_id: ".count($help);

      if(count($help) == 0){
        $count_price ++;
        // echo "NOT found current price_id -- count_price: {$count_price}<br/>";
        $prices[$count_price] = array_intersect_key($item, array_flip($allowed));
      }

      if(!isset($prices[$count_price]['specifications']))
        $prices[$count_price]['specifications'] = array();

      $allowed = array('id', 'name', 'measurement', 'unit');
      $spec = array_intersect_key($item, array_flip($allowed));
      // array_push($prices[$item['price_id']]['specifications'], $spec);
      array_push($prices[$count_price]['specifications'], $spec);

      // echo "after - prices[price_id] - {$item['price_id']}: ";
      // echo "<pre>";
      // print_r($prices);
      // echo "</pre>";
      // echo "<hr/>";
      */

      $allowed = array('price_id', 'price', 'per');
      if(!isset($prices[$item['price_id']]))
        $prices[$item['price_id']] = array_intersect_key($item, array_flip($allowed));
      // echo "before - prices[price_id] - {$item['price_id']}: ";
      // print_r($prices[$item['price_id']]);
      // echo "<br/>";
      if(!isset($prices[$item['price_id']]['specifications']))
        $prices[$item['price_id']]['specifications'] = array();
      $allowed = array('id', 'name', 'measurement', 'unit');
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

    //appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "rn";
        echo "handle_error: {$err}";
    }
 
    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "rn";
        echo "handle_success: {$succ}";
    }

  public function update(){
    // print_r($this->input->post());
    $product_id = $this->input->post('id');
    // echo "product_id: {$product_id}";
    $data = array('product' => array('name' => $this->input->post('name')),
      'prices' => $this->input->post('prices'));


    $config = array();
    $config['image_library'] = 'gd2';
    // $config['source_image'] = '/path/to/image/mypic.jpg';
    $upload_path = './uploads';
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size'] = '2000';
    $config['encrypt_name'] = TRUE;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 75;
    $config['height']       = 50;

    $this->load->library('image_lib', $config);
    $image_data = array();
    $is_file_error = FALSE;
    //check if file was selected for upload
    if (!$_FILES) {
      echo "NO FILES<br/>";
      $is_file_error = TRUE;
      $this->handle_error('Select an image file.');
    }
    else
      echo "FILEEEES IS HERE<br/>";

    //if file was selected then proceed to upload
    if (!$is_file_error) {
      echo "No error in file<br/>";
      //load the preferences
      $this->load->library('upload', $config);
      //check file successfully uploaded. 'image_name' is the name of the input
      if (!$this->upload->do_upload('image')) {
        echo "Upload failed<br/>";
        //if file upload failed then catch the errors
        $this->handle_error($this->upload->display_errors());
        $is_file_error = TRUE;
      } else {
        echo "Upload succeed<br/>";
        //store the file info
        $image_data = $this->upload->data();
        echo "image_data: ";
        print_r($image_data);
        echo "<br/>";
        $config['image_library'] = 'gd2';
        $config['source_image'] = $image_data['full_path']; //get original image
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 150;
        $config['height'] = 100;
        $this->load->library('image_lib', $config);
        if (!$this->image_lib->resize()) {
          echo "Cannot resize<br/>";
          $this->handle_error($this->image_lib->display_errors());
        }
      }
    }
    // There were errors, we have to delete the uploaded image
    if ($is_file_error) {
      echo "FILE ERROR<br/>";
      if ($image_data) {
        echo "IMAGE Data is HERE<br/>";
        $file = $upload_path . $image_data['file_name'];
        if (file_exists($file)) {
          unlink($file);
        }
      }
    } else {
      $data['resize_img'] = $upload_path . $image_data['file_name'];
      $this->handle_success('Image was successfully uploaded to direcoty <strong>' . $upload_path . '</strong> and resized.');
    }
    /*
    if($this->product_model->update($product_id, $data))
      $this->session->set_flashdata('message', "Update product succeed");
    else
      $this->session->set_flashdata('message', "Update product failed");

    redirect('admin/products');
    */
  }

  public function delete($params){
    if($this->product_model->_delete($params[0]))
      redirect('admin/products');
  }
}

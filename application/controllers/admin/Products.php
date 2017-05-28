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

    $images = $this->handle_upload($_FILES, 'image', array('thumb'));
    if($this->product_model->create($data, $images))
      $this->session->set_flashdata('message', "Create product succeed");
    else
      $this->session->set_flashdata('message', "Create product failed");

    redirect('admin/products');
  }

  public function edit($params){
    $this->middle = 'admin/products/edit';
    $product = $this->product_model->get($params[0]);
    $this->data["product"] = $product["product"];
    $this->data["images"] = $this->product_image_model->get($params[0]);
    // echo "<pre>";
    // print_r($product['prices']);
    // echo "</pre>";
    // echo "<br/>";
    $prices = array();
    $count_price = 0;
    $count_spec = 0;
    foreach($product['prices'] as $key => $item){
      $allowed = array('price_id', 'price', 'per');
      if(!isset($prices[$item['price_id']]))
        $prices[$item['price_id']] = array_intersect_key($item, array_flip($allowed));

      if(!isset($prices[$item['price_id']]['specifications']))
        $prices[$item['price_id']]['specifications'] = array();
      $allowed = array('id', 'name', 'measurement', 'unit');
      $spec = array_intersect_key($item, array_flip($allowed));
      array_push($prices[$item['price_id']]['specifications'], $spec);
    }
    $this->data["prices"] = $prices;
    $this->data["id"] = $params[0];
    $this->data["options_per"] = $this->options_per;
    $this->data["options_specs_name"] = $this->options_specs_name;
    $this->data["options_specs_unit"] = $this->options_specs_unit;
    $this->layout();
  }

  //appends all error messages
  private function handle_error($err) {
    $this->error .= $err . "rn";
    echo "handle_error: {$err}<br/>";
  }

  //appends all success messages
  private function handle_success($succ) {
    $this->success .= $succ . "rn";
    echo "handle_success: {$succ}<br/>";
  }

  private function handle_upload($files, $input_name, $image_sizes){
    $result = array('success' => array(), 'error' => array('upload' => array(), 'resize' => array()));
    $config = array();
    $upload_path = './uploads';
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'jpg|jpeg|png';
    // $config['max_size'] = '2000'; // default is 2048KB => 2MB
    $config['encrypt_name'] = TRUE;

    $image_data = array();
    $is_file_error = FALSE;
    // Check if files are selected or not
    if($files[$input_name]['error'][0] == 4 || empty($files[$input_name]['name'])) {
      // echo "NO FILES<br/>";
      $is_file_error = TRUE;
      $this->handle_error('Select an image file.');
    }

    // if file was selected then proceed to upload
    if (!$is_file_error) {
      $files_count = count($_FILES[$input_name]['name']);
      for($i=0; $i<$files_count; $i++){
        $_FILES['image']['name'] = $_FILES['images']['name'][$i];
        $_FILES['image']['type'] = $_FILES['images']['type'][$i];
        $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
        $_FILES['image']['error'] = $_FILES['images']['error'][$i];
        $_FILES['image']['size'] = $_FILES['images']['size'][$i];

        $this->load->library('upload');
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('image')){
          // echo "Upload failed<br/>";
          //if file upload failed then catch the errors
          $this->handle_error($this->upload->display_errors());
          // $is_file_error = TRUE;
          $image_data = $this->upload->data();
          $file = $upload_path . $image_data['file_name'];
          // echo "file: {$file}<br/>";
          array_push($result['error']['upload'], $image_data['orig_name']);
          if(file_exists($file)){
            unlink($file);
          }
        } // close check upload file failed
        else{
          // echo "Upload succeed<br/>";
          $image_data = $this->upload->data();
          // Resize file
          $image_lib_config['image_library'] = 'gd2';
          $image_lib_config['source_image'] = $image_data['full_path']; //get original image
          $image_lib_config['maintain_ratio'] = TRUE;
          $image_lib_config['width'] = 150;
          $image_lib_config['height'] = 100;
          $image_lib_config['create_thumb'] = TRUE;
          $image_lib_config['thumb_marker'] = '_thumb';
          $this->load->library('image_lib');
          $this->image_lib->initialize($image_lib_config);
          if (!$this->image_lib->resize()) {
            // $this->handle_error($this->image_lib->display_errors());
            array_push($result['error']['resize'], $image_data['orig_name']);
          }
          else{
            echo "image_lib resize OK<br/>";
            $alt = pathinfo($image_data['orig_name'], PATHINFO_FILENAME);
            array_push($result['success'], array('filename' => $image_data['file_name'], 'alt' => $alt));
            // $this->handle_success('Image was successfully uploaded to direcoty <strong>' . $upload_path . '</strong> and resized.');
          }
        }// close check upload file succeed
      } // close foreach
      //check file successfully uploaded. 'image_name' is the name of the input
    } // close check is_file_error

    return $result;
  }

  public function update(){
    // print_r($this->input->post());
    $product_id = $this->input->post('product_id');
    // echo "product_id: {$product_id}";
    $data = array('product' => array('name' => $this->input->post('name'),
        'category' => $this->input->post('category'),
        'description' => $this->input->post('description')),
      'prices' => $this->input->post('prices'),
      'images' => $this->input->post('product_images'));

    $new_images = $this->handle_upload($_FILES, 'images', array('thumb'));
    /*
    echo "images result: <br/>";
    print_r($new_images);
    echo "<br/>";
    $this->product_model->update($product_id, $data, $new_images);
    */
    if($this->product_model->update($product_id, $data, $new_images))
      $this->session->set_flashdata('message', "Update product succeed");
    else
      $this->session->set_flashdata('message', "Update product failed");

    redirect('admin/products');
  }

  public function delete($params){
    if($this->product_model->_delete($params[0]))
      redirect('admin/products');
  }
}

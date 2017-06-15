<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_images extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('category_model');
    $this->load->model('product_image_model');
    $this->load->model('product_model');
  }

  // this function make user can access /admin/products/new
  public function _remap($method, $params = array()){
    if ($method === 'delete'){
      $this->_delete($params);
    }
    else{
      $this->$method($params);
    }
  }

  public function _delete($params){
    $product_image_id = $params[0];
    $result = $this->product_image_model->delete_by_id($product_image_id);
    echo json_encode(array('status' => 'ok', 'deleted' => $result));
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
      // $this->handle_error('Select an image file.');
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
          // $this->handle_error($this->upload->display_errors());
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

  public function add($params){
    $new_images = $this->handle_upload($_FILES, 'images', array('thumb'));
    $result = $this->product_image_model->bulk_create($new_images['success'], $params[0]);
    if(count($result) >= count($_FILES[$input_name]['name']))
      $this->session->set_flashdata('message', "Product images succeed to add");
    else
      $this->session->set_flashdata('message', "Product images failed to add");

    redirect('admin/categories/edit/'.$params[0]);
  }
}

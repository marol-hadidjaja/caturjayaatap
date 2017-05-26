<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends Admin_Controller{
  function __construct(){
    parent::__construct();

    $this->load->model('slider_model');
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

  private function handle_upload($files, $input_name){
    $result = array('success' => array(), 'error' => array('upload' => array()));
    $r = '';
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
      // for($i=0; $i<$files_count; $i++){
        /*
        $_FILES['image']['name'] = $_FILES['images']['name'][$i];
        $_FILES['image']['type'] = $_FILES['images']['type'][$i];
        $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
        $_FILES['image']['error'] = $_FILES['images']['error'][$i];
        $_FILES['image']['size'] = $_FILES['images']['size'][$i];
        */

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
          /*
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
          */
          $alt = pathinfo($image_data['orig_name'], PATHINFO_FILENAME);
          $r = $image_data['orig_name'];
          // array_push($result['success'], array('filename' => $image_data['file_name'], 'alt' => $alt));
        }// close check upload file succeed
      // } // close foreach
      //check file successfully uploaded. 'image_name' is the name of the input
    } // close check is_file_error

    return $r;
    // return $result;
  }

  public function index(){
    $this->middle = 'admin/sliders/index';
    $data = array();
    $this->data['sliders'] = $this->slider_model->get();
    $this->layout();
  }

  public function _new(){
    $this->middle = 'admin/sliders/new';
    $this->layout();
  }

  public function create(){
    $data = array('title' => $this->input->post('title'),
      'description' => $this->input->post('description'));

    $image = $this->handle_upload($_FILES, 'image');
    $data['filename'] = $image;
    print_r($data);
    if($this->slider_model->create($data))
      $this->session->set_flashdata('message', "Create slider succeed");
    else
      $this->session->set_flashdata('message', "Create slider failed");

    // redirect('admin/sliders');
  }

  public function edit($id){
    $this->middle = 'admin/sliders/edit';
    $data = array();
    $data['slider'] = $this->slider_model->get_pages($url);
    $data['id'] = $id;
    $this->data = $data;
    $this->layout();
  }

  public function update($id){
    $data = array('name' => $this->input->post('name'),
      'description' => $this->input->post('description'));
    if($this->slider_model->update($id, $data))
      $this->session->set_flashdata('message', "Update slider succeed");
    else
      $this->session->set_flashdata('message', "Update slider failed");

    redirect('admin/dashboard');
  }
}

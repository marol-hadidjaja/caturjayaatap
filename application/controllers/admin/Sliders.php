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
    $r = array('status' => '', 'filename' => '');
    $upload_path = './uploads/';
    $config = array();
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['encrypt_name'] = TRUE;
    $config['max_size'] = '2048';

    $image_data = array();
    $is_file_error = FALSE;
    // Check if files are selected or not
    if($files[$input_name]['error'][0] == 4 || empty($files[$input_name]['name'])) {
      $is_file_error = TRUE;
      $r['status'] = 'error';
      $r['message'] = 'Select an image file.';
    }

    // if file was selected then proceed to upload
    if (!$is_file_error) {
      $this->load->library('upload');
      $this->upload->initialize($config);
      if(!$this->upload->do_upload('image')){
        // if file upload failed then catch the errors
        $image_data = $this->upload->data();
        $file = $upload_path . $image_data['file_name'];
        $r['status'] = 'error';
        $r['message'] = $this->upload->display_errors();
        if(strlen($image_data['file_name']) > 0 && file_exists($file)){
          unlink($file);
        }
      } // close check upload file failed
      else{
        $image_data = $this->upload->data();
        $image_lib_config['image_library'] = 'gd2';
        $image_lib_config['source_image'] = $image_data['full_path']; //get original image
        $image_lib_config['maintain_ratio'] = TRUE;
        $image_lib_config['width'] = 150;
        $image_lib_config['height'] = 100;
        $image_lib_config['create_thumb'] = TRUE;
        $image_lib_config['thumb_marker'] = '_thumb';
        $image_lib_config['remove_spaces'] = TRUE;
        $this->load->library('image_lib');
        $this->image_lib->initialize($image_lib_config);

        if (!$this->image_lib->resize()) {
          // $this->handle_error($this->image_lib->display_errors());
          // array_push($result['error']['resize'], $image_data['orig_name']);
          $r['status'] = 'error';
          $r['filename'] = $image_data['orig_name'];
          $r['message'] = $this->image_lib->display_errors();
        }
        else{
          $alt = pathinfo($image_data['orig_name'], PATHINFO_FILENAME);
          $r['status'] = 'success';
          $r['filename'] = $image_data['file_name'];
          $r['alt'] = $alt;
          // array_push($result['success'], array('filename' => $image_data['file_name'], 'alt' => $alt));
          // $this->handle_success('Image was successfully uploaded to direcoty <strong>' . $upload_path . '</strong> and resized.');
        }
      }// close check upload file succeed
    } // close check is_file_error

    return $r;
  }

  public function index(){
    $this->middle = 'admin/sliders/index';
    $data = array();
    $this->data['sliders'] = $this->slider_model->get();
    $this->data['title'] = 'CJA Admin - Sliders';
    $this->layout();
  }

  public function _new(){
    $this->middle = 'admin/sliders/new';
    $this->data['title'] = 'CJA Admin - New Slider';
    $this->layout();
  }

  public function create(){
    $data = array('title' => $this->input->post('title'),
      'description' => $this->input->post('description'));

    $result_upload = $this->handle_upload($_FILES, 'image');
    if($result_upload['status'] == 'success')
      $data['filename'] = $result_upload['filename'];

    if($this->slider_model->create($data))
      $this->session->set_flashdata('message_success', "Create slider succeed");
    else
      $this->session->set_flashdata('message_fail', "Create slider failed");

    redirect('admin/sliders');
  }

  public function edit($params){
    $this->middle = 'admin/sliders/edit';
    $this->data['id'] = $params[0];
    $this->data['slider'] = $this->slider_model->get($params[0]);
    $this->data['title'] = 'CJA Admin - Edit Slider '.$this->data['slider']['title'];
    $this->layout();
  }

  public function update(){
    $data = array('title' => $this->input->post('title'),
      'description' => $this->input->post('description'));

    $result_upload = $this->handle_upload($_FILES, 'image');
    if($result_upload['status'] == 'success'){
      $data['filename'] = $result_upload['filename'];
    }
    else{
      $upload_message = trim(strip_tags($result_upload['message']));
      if(strpos($upload_message, 'exceeds the maximum') != null && strpos($upload_message, 'exceeds the maximum') >= 0)
        $upload_message = 'Maximum file size: 2MB';

      $this->session->set_flashdata('message_fail', "Update slider failed: ".$upload_message);
    }

    $slider_id = $this->input->post('id');
    if($this->slider_model->update($slider_id, $data))
      $this->session->set_flashdata('message_success', "Update slider succeed");
    else
      $this->session->set_flashdata('message_fail', "Update slider failed");

    redirect('admin/sliders');
  }
}

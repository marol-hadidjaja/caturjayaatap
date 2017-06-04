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
    $upload_path = './uploads';
    $config = array();
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['encrypt_name'] = TRUE;

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
        // echo "Upload succeed<br/>";
        $image_data = $this->upload->data();
        $r['status'] = 'success';
        $r['filename'] = $image_data['file_name'];
      }// close check upload file succeed
    } // close check is_file_error

    return $r;
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

    $result_upload = $this->handle_upload($_FILES, 'image');
    if($result_upload['status'] == 'success')
      $data['filename'] = $result_upload['filename'];

    if($this->slider_model->create($data))
      $this->session->set_flashdata('message', "Create slider succeed");
    else
      $this->session->set_flashdata('message', "Create slider failed");

    redirect('admin/sliders');
  }

  public function edit($params){
    $this->middle = 'admin/sliders/edit';
    $this->data['id'] = $params[0];
    $this->data['slider'] = $this->slider_model->get($params[0]);
    $this->layout();
  }

  public function update(){
    $data = array('title' => $this->input->post('title'),
      'description' => $this->input->post('description'));

    $result_upload = $this->handle_upload($_FILES, 'image');
    if($result_upload['status'] == 'success'){
      $data['filename'] = $result_upload['filename'];

      $slider_id = $this->input->post('id');
      if($this->slider_model->update($slider_id, $data))
        $this->session->set_flashdata('message', "Update slider succeed");
      else
        $this->session->set_flashdata('message', "Update slider failed");

      redirect('admin/sliders');
    }
    else{
      $upload_message = '';
      if(strpos($result_upload['message'], 'exceeds the maximum') >= 0)
        $upload_message = 'Maximum file size: 2MB';
      $this->session->set_flashdata('message', "Update slider failed: ".$upload_message);
    }
  }
}

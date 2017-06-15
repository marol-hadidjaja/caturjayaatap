<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->database();
    $this->load->add_package_path(APPPATH.'libraries/third_party/ion_auth/');
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'),
      $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	public function _get_csrf_nonce(){
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue')){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

  public function edit(){
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false){
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name'    => 'new',
				'id'      => 'new',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name'    => 'new_confirm',
				'id'      => 'new_confirm',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			// render
      $this->data['title'] = 'CJA Admin - Edit Password';
      $this->middle = 'admin/users/edit';
      $this->layout();
		}
		else{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change){
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->ion_auth->logout();
        redirect('auth/login', 'refresh');
			}
			else{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('admin/user/edit', 'refresh');
			}
		}
  }
}

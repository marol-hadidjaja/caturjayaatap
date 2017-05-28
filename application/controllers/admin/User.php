<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller{
  // var $template  = array();
  // var $data      = array();
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
    /*
		$this->data['title'] = $this->lang->line('edit_user_heading');

    $id = $this->ion_auth->user()->row()->id;
		$user = $this->ion_auth->user($id)->row();

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');

		if (isset($_POST) && !empty($_POST)){
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')){
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			if ($this->input->post('password')){
        $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'),
          'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE){
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'company'    => $this->input->post('company'),
					'phone'      => $this->input->post('phone'),
				);

				// update the password if it was posted
				if ($this->input->post('password')){
					$data['password'] = $this->input->post('password');
				}

			  // check to see if we are updating the user
			  if($this->ion_auth->update($user->id, $data)){
          // redirect them back to the admin page if admin, or to the base url if non admin
          $this->session->set_flashdata('message', $this->ion_auth->messages() );
          if ($this->ion_auth->is_admin()){
						redirect('admin/dashboard', 'refresh');
					}
					else{
						redirect('/', 'refresh');
					}
        }
        else{
          // redirect them back to the admin page if admin, or to the base url if non admin
          $this->session->set_flashdata('message', $this->ion_auth->errors() );
          if ($this->ion_auth->is_admin()){
            redirect('admin/dashboard', 'refresh');
          }
          else{
            redirect('/', 'refresh');
          }
        }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);
    */

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
			// $this->_render_page('auth/change_password', $this->data);
      // $this->load->view('admin/users/edit', $this->data);
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

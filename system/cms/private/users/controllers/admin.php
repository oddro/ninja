<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller {

	function __construct()
	{
		parent::__construct();

		//Set Laguage
		//Form
		$this->first_name	= 'First Name';
		$this->last_name	= 'Last Name';
		$this->username		= 'Username';
		$this->email		= 'Email';
		$this->password		= 'Password';
		$this->repassword	= 'Re Password';
	}

	function index()
	{
		$data 	= array();
		//list the usersf
		$users 				= $this->ion_auth->users()->result();
		foreach ($users as $k => $user)
		{
			$users[$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}
		$data['users'] = $users;

		// $data_notification	= get_notification_data($this->lang->line('user_title'), $this->lang->line('user_notification_info'));

		$this->template
        	->title($this->title,'User List')

        	->set_breadcrumb('User List','#')

			// ->set_partial('notifications','partials/notifications.html',$data_notification)

        	->set('module_name','User List')
        	->set('module_desc','Listing of User')

			->build('users/admin/read',$data);
	}

	//Create pages
	public function create( $data_notification = array() )
	{ 
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->template
        	->title($this->title,'User List')

        	->set_breadcrumb('User',site_url('admin/users'))
			->set_breadcrumb('Add User', '#')

        	->set('module_name','User Add')
        	->set('module_desc','Add new user')

			->build('users/admin/create',$data);
	}

	function do_create()
	{
		$message 	= array();
		// check if we have posted data - i.e. hit save
		if ($_POST)
		{
			//validate form input
			$this->form_validation->set_rules('user_first_name', $this->first_name, 'required|xss_clean');
			$this->form_validation->set_rules('user_last_name', $this->last_name, 'xss_clean');
			$this->form_validation->set_rules('user_email', $this->email, 'required|valid_email');
			$this->form_validation->set_rules('user_password', $this->password, 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[user_repassword]');
			$this->form_validation->set_rules('user_repassword', $this->repassword, 'required');
			$this->form_validation->set_error_delimiters('', '');

			if ($this->form_validation->run() == true)
			{
				$username = strtolower($this->input->post('user_first_name')) . ' ' . strtolower($this->input->post('user_last_name'));
				$email    = $this->input->post('user_email');
				$password = $this->input->post('user_password');

				$additional_data = array(
					'first_name' => $this->input->post('user_first_name'),
					'last_name'  => $this->input->post('user_last_name'),
				);
			}
			//check to see if we are creating the user
			if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
			{
				$data['error'] 			= false;
				if ( $this->input->is_ajax_request() )
				{
					$data['message_body']	= $this->lang->line('users_message_succes');
				}
				else
				{
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message_title', 'User Created');
					$this->session->set_flashdata('message_body', $this->lang->line('users_message_succes'));
				}
			}
			else
			{
				$data['error'] 			= true;
				//display the create user form
				//set the flash data error message if there is one
				if ( $this->input->is_ajax_request() )
				{
					$data['message_body']	= (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
				}
				else
				{
					$message	 = (validation_errors() ? validation_errors() : ($this->ion_auth->errors_array() ? $this->ion_auth->errors_array() : $this->session->flashdata('message')));
				}
			}
		}
		else
		{
			$data['error'] 			= true;
			$data['message_body']	= 'Please check your connection!';
		}

		if ( $this->input->is_ajax_request() )
		{
			echo json_encode($data);
		}
		else
		{
			if ($data['error'])
			{
				$data_notification['notification_type'] = 'error';
				$data_notification['notification_title'] = 'User Error';
				$data_notification['notification_body'] = $message;
				// $this->session->set_flashdata('message_type', 'error');
				// $this->session->set_flashdata('message_title', 'User Error');
				// $this->session->set_flashdata('message_body', $message);
				// print_r($message);
				// die();
				// redirect('users/create');
				$this->create($data_notification);
				# code...
			}
			else
			{
				$this->index();
			}
		}
	}
	// Update User
	function update( $id = 0 )
	{
		//Get User Data
		$data['user']	= (array)$this->ion_auth->user($id)->row();
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template
        	->title($this->title,'Edit User')

        	->set_breadcrumb('User',site_url('admin/users'))
        	->set_breadcrumb('User Edit','#')

        	->set('module_name','User Update')
        	->set('module_desc','Update any user profile')

			->build('users/admin/update',$data);
	}
	
	function do_update()
	{
		// check if we have posted data - i.e. hit update
		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			// if ($this->_valid_csrf_nonce() === FALSE)
			// {
			// 	show_error('This form post did not pass our security checks.');
			// }
			
			//validate form input
			$this->form_validation->set_rules('user_first_name', $this->first_name, 'required|xss_clean');
			$this->form_validation->set_rules('user_last_name', $this->last_name, 'xss_clean');
			$this->form_validation->set_rules('user_username', $this->email, 'required|xss_clean');
			
			$data = array(
				'first_name' => $this->input->post('user_first_name'),
				'last_name'  => $this->input->post('user_last_name'),
				'username'	=> $this->input->post('user_username')
			);
			
			//update the password if it was posted
			if ($this->input->post('user_password'))
			{
				$this->form_validation->set_rules('user_password', $this->password, 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[user_repassword]');
				$this->form_validation->set_rules('user_repassword', $this->repassword, 'required');

				$data['password'] = $this->input->post('user_password');
			}

			if ($this->form_validation->run() === TRUE)
			{ 
				$user_id			= $this->input->post('user_id');
				$update				= $this->ion_auth->update($user_id, $data);
				
				if(!$update)
				{
					//set the flash data error message if there is one
					if ( $this->input->is_ajax_request() )
					{
						$data['error'] 			= true;
						$data['message_body']	= $this->ion_auth->errors();
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
					}
					// validation error
				}
				else
				{
					if ( $this->input->is_ajax_request() )
					{
						$data['error'] 			= false;
						$data['message_body']	= $this->lang->line('users_message_succes');
					}
					else
					{
						// validation successful
						$this->session->set_flashdata('message', $this->lang->line('users_message_succes'));
					}
				}
			}
		}
		if ( $this->input->is_ajax_request() )
		{
			echo json_encode($data);
		}
		else
		{
			redirect('admin/users');
		}
	}


	//Delete User with id
	function delete($id = 0)
	{
		if ($id)
		{
			$return	= $this->ion_auth->delete_user($id);
		}
		else
		{
			if ($_POST) 
			{
				$action_to	= $this->input->post('action_to');
				foreach ($action_to as $key => $value) {
					$return	= $this->ion_auth->delete_user($value);
					if ( ! $return)
					{
						break;
					}
				}
			}
			else
			{
				$return = FALSE;
			}
		}
		if ($return == TRUE)
		{
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message_title', 'user deleted.');
			$this->session->set_flashdata('message_body', 'user deleted.');
			$data['error'] 			= FALSE;
			$data['message_body']	= 'user deleted.';
		}
		else
		{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message_title', 'Shomting error.');
			$this->session->set_flashdata('message_body', 'Shomting error.');
			$data['error'] 			= TRUE;
			$data['message_body']	= 'Shomting error.';
		}
		if ( $this->input->is_ajax_request() )
		{
			echo json_encode($data);
		}
		else
		{
			redirect('admin/users');
		}
	}
	
	function group_delete($id = 0)
	{
		if($id!=0)
		{
			// pass the right arguments and it's done
			$group_delete = $this->ion_auth->delete_group($id);
			
			if(!$group_delete)
			{
				// validation error
				$this->session->set_flashdata('message', $this->ion_auth->errors());
			}
			else
			{
				// validation successful
				$this->session->set_flashdata('message', $this->lang->line('group_message_delete_succes'));
			}
		}
		redirect('admin/users/group');
	}
		//activate the user
	function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message_title', 'Actived');
			$this->session->set_flashdata('message_body', $this->ion_auth->messages());
			redirect("users", 'refresh');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message_title', 'Faild');
			$this->session->set_flashdata('message_body', $this->ion_auth->errors());
			redirect("users", 'refresh');
		}
	}

	//deactivate the user
	function deactivate($id = NULL)
	{
				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$deactive = $this->ion_auth->deactivate($id);
				}

		if ($deactive)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message_title', 'Actived');
			$this->session->set_flashdata('message_body', $this->ion_auth->messages());
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message_title', 'Faild');
			$this->session->set_flashdata('message_body', $this->ion_auth->errors());
		}
			//redirect them back to the auth page
			redirect('users', 'refresh');
	}
	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
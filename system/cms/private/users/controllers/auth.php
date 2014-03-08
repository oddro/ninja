<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	//Load Login Form
	function login()
	{
		// For Login we use admin template manual 
		$this->config->load('theme');
		
		//Get site theme id
		$theme_id	= $this->options->get('admin_theme');
		
		//Get site theme dir
		$theme				= Model\Module\Themes\Models\Themes::find($theme_id);
		$obj_theme_param	= json_decode($theme->params);
		$theme_dir			= $obj_theme_param->dir;
		
		$conf_site_theme_path	= $this->config->item('site_path', 'theme');
		$conf_admin_theme_path	= $this->config->item('admin_path', 'theme');
		$conf_theme_path		= str_replace('/'.$conf_site_theme_path,'',$this->config->item('path', 'theme'));

		$theme_path				= $conf_theme_path.'/'.$conf_admin_theme_path;
		echo $theme_path;
		$this->config->set_item('path', $theme_path, 'theme');
		
		$this->load->library('theme');
		$this->theme->set_theme($theme_dir);

		$this->theme
			 ->set_layout('login')
			 ->block('form', 'blocks/login_form')
			 ->set('title', $this->lang->line('user_login_title'))
			 ->set('login_form_name', $this->lang->line('login_form_name'))
			 ->set('login_form_password', $this->lang->line('login_form_password'))
			 ->set('contact_form_phone', $this->lang->line('contact_form_phone'))
			 ->set('contact_form_messages', $this->lang->line('contact_form_messages'))
			 ->set('contact_form_submit', $this->lang->line('contact_form_submit'))
			 ->set('contact_form_cancel', $this->lang->line('contact_form_cancel'))
			 ->view('login');

		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{ 
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{ 
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect($this->config->item('base_url'), 'refresh');
			}
			else
			{ 
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('admin/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{  
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			$this->load->view('auth/login', $this->data);
		}
	}

	//log the user out
	function logout()
	{
		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them back to the page they came from
		redirect('', 'refresh');
	}
}

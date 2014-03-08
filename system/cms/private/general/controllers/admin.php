<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * The admin controller
 *
 * @author 	Agung Hari Wijaya (http://a9un9hari.com)
 * @package	CMS\private\admin\Controllers
 */
class Admin extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	// Load Form to create/insert data
	public function create($table = null)
	{ 
		$this->load->helper('config');
		$path = FCPATH.'system\cms\config\simsalabim\\'.$table.'.json';
		$json = config_file_get_content($path);
		$data['config_form'] = config_read_json_decode($json);

		// get notification data
		$messages['message_body'] = $this->session->flashdata('message_body');
		$messages['message_type'] = $this->session->flashdata('message_type');

		$this->template

			->title('Content Management System','Add Artist')

        	->set_breadcrumb('Artist Profile',site_url('admin/artist'))
        	->set_breadcrumb('Add Artist Profile','#')

        	->set('module_name','Add Artist Profile')
        	->set('module_desc','Add New Artist Profile')

        	// ->set_partial('messages','partials/admin_messages',$messages)

			->build('general/admin/create',$data);
	}

	
	/**
	 * Shows the contact messages list.
	 */
	public function index($table = null)
	{
		// $messages['message_body'] = $this->session->flashdata('message_body');
		// $messages['message_type'] = $this->session->flashdata('message_type');

		// get news data
		$test = General::constructor($table)->all();
		$data['data'] = $test->toArray();

		$this->template
			->title('Content Management System','Gallery')

        	->set_breadcrumb('Gallery','#')

        	->set('module_name','Gallery')
        	->set('module_desc','Gallery Listing')

        	// ->set_partial('messages','partials/admin_messages',$messages)

			->build('general/admin/read',$data);
	}

	// Load Form to update/edit data
	public function update($table = null, $id = 0 )
	{
		$this->load->helper('config');
		$path = FCPATH.'system\cms\config\simsalabim\\'.$table.'.json';
		$json = config_file_get_content($path);
		$data['config_form'] = config_read_json_decode($json);

		$messages['message_body'] = $this->session->flashdata('message_body');
		$messages['message_type'] = $this->session->flashdata('message_type');


		$this->template
			->title('Content Management System','Edit Artist Profile')

        	->set_breadcrumb('Artist Profile',site_url('admin/artist'))
			// ->set_breadcrumb($data['data']['data']->name, '#')

        	->set('module_name','Update Artist Profile')
        	->set('module_desc','Update Any Artist Profile Data')

        	// ->set_partial('messages','partials/admin_messages',$messages)

			->build('general/admin/update',$data);
	}
}
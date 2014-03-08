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

	/**
	 * Shows the contact messages list.
	 */
	public function index()
	{
        $this->template
        	->title($this->title,'Dashboard')

        	->set('module_name','Dashboard')
        	->set('module_desc','General Information')
        	
        	->set_breadcrumb('Dashboard','#')
        	->build('admin/dashboard');
	}
}
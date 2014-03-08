<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @author		Agung Hari Wijaya(http://a9un9hari.com)
 * @package 	cms\core\controllers
 */
class Admin_Controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			$url 	= uri_string();
			$url_array 	= explode('/', uri_string());

			//redirect them to the login page
			redirect('admin/login/'.base64_encode($url), 'refresh');
		}

		$this->title = 'Content Management System';

        $this->template
        ->set_theme('admin')
        ->set('theme_path',base_url().$this->template->get_theme_path())
        ->set('user',(array)$this->ion_auth->user()->row())
        
        ->append_metadata('
            <script type="text/javascript">
                var BASE_URL = "'.base_url().'";
                var BASE_TEMPLATE = "'.$this->template->get_theme_path().'";
            </script>')
        
        ->set_partial('header','partials/admin_header')
        ->set_partial('navigation','partials/admin_navigation')
        ->set_partial('footer','partials/admin_footer');

        // Make sure whatever page the user loads it by, its telling search robots the correct formatted URL
        $this->template->set_metadata('canonical', site_url($this->uri->uri_string()), 'link');
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Public_Controller {

	public function index()
	{
		$this->load->model('product/categoryProduct');
		ci()->data['categoryProduct'] = CategoryProduct::all()->toArray();
        $this->build();
	}
}

/* End of file home.php */
/* Location: ./content/modules/home/controllers/home.php */
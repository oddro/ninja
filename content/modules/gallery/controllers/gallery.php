<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gallery extends Public_Controller {

	public function index()
	{
		$this->load->model('product/productreadydata');
		ci()->data['products'] = ProductReadyData::all()->toArray();
        $this->build();
	}
}

/* End of file gallery.php */
/* Location: ./content/modules/gallery/controllers/gallery.php */
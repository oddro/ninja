<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Public_Controller {

	public function index()
	{
		ci()->data['results'] = 'test';
        $this->build();
	}
}

/* End of file home.php */
/* Location: ./content/modules/home/controllers/home.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends Public_Controller {

	public function index()
	{
		ci()->data['results'] = 'test';
        $this->build();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
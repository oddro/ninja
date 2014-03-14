<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends Public_Controller {

	public function index()
	{
		ci()->data['data'] = 'data';
        $this->build();
	}

	// View mini cart
	public function total()
	{
		if($this->input->is_ajax_request())
		{	
			$total = $this->cart->total();
			if( ! empty($total) )
			{
				echo '<i class="fa fa-shopping-cart"></i> IDR '.$this->cart->format_number($total);
			}
			else
			{
				echo '<i class="fa fa-shopping-cart"></i> empty cart';
			}
		}
	}

	// Add product to cart
	public function add($id = 0)
	{
		$this->load->model('product/productreadydata');

		$post_qty = $this->input->post('qty');
		$qty = ($post_qty) ? $post_qty : 1;
		// Get data from db
		$product = ProductReadyData::find($id);
		// echo $this->db->last_query();

		$data = array(
               'id'      => $product->id,
               'qty'     => $qty,
               'price'   => $product->price,
               'name'    => $product->name
            );

		$this->cart->insert($data);

		if( ! $this->input->is_ajax_request()) {
			redirect('cart','refresh');
		}
		else{
			return true;
		}
	}
}

/* End of file cart.php */
/* Location: ./content/modules/cart/controllers/cart.php */
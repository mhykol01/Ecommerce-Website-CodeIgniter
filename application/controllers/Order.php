<?php 
	class order extends CI_Controller {
		function index() {
			if ($this->cart->contents()) {
				$this->load->view('order');
			} else {
				redirect('/Cart/', 'location');
			}
		}
		function missing() {
			$this->load->view('missing');
		}
	}
?>
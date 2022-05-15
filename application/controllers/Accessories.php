<?php
	class accessories extends CI_Controller {
	    function index() {
	        $this->load->view('chains');
	    }
		function display() {
			if($_POST) {
				$data = array(
					'from' => $this->input->post('from'),
					'id' => $this->input->post('id'),
					'title' => $this->input->post('title'),
					'price' => $this->input->post('price'),
					'length' => $this->input->post('length'),
					'size' => $this->input->post('size')
				);
				$this->load->view('view', $data);
			} else 
				redirect('/Products/Accessories/', 'location');
		}
	}
?>
<?php
	class clothing extends CI_Controller {
		function index() {
		    $this->load->view('clothing');
		}
		function shirts() {
		    $this->load->view('shirts');
		}
		function sweaters() {
		    $this->load->view('sweaters');
		}
		function hoodies() {
		    $this->load->view('hoodies')
		}
	}
?>
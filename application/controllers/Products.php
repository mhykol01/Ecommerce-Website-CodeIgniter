<?php 
    class products extends CI_Controller {
        function index() {
            $this->load->view('shirts');
        }
        function shirts() {
            $this->load->view('shirts');
        }
        function hoodies() {
            $this->load->view('hoodies');
        }
        function accessories() {
            $this->load->view('chains');
        }
        function stickers() {
            $this->load->view('stickers');
        }
    }
?>
<?php 
	class product_model extends CI_Model {
		public function get_product_details($id){
			$this->db->select('*');
			$this->db->from('products');
			$this->db->where('id', $id);
			
			$query = $this->db->get();
			return $query->row();
		}
		public function get_products() {
			$this->db->select('*');
			$this->db->from('products');
			$query = $this->db->get();
			return $query->result();
		}
		public function add_order($order_data) {
			$this->db->insert('order_data', $order_data);
		}
	}
?>
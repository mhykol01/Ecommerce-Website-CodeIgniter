<?php
	class cart extends CI_Controller {
		public $paypal_data = '';
		public $subtotal;
		public $total = 0;
		public $grand_total;
		
		public $shipping = 3.99;
		public $paypal_mode = 'live';
		public $paypal_api_username = '';
		public $paypal_api_password = '';
		public $paypal_api_signature = '';
		public $paypal_currency_code = 'USD';
		public $paypal_return_url = echo base_url() + '/Cart/Process/';
		public $paypal_cancel_url = echo base_url() + '/Cart/Cancel/';
		
		function Index() {
			$this->load->view('cart');
		}
		public function Add() {
			if ($_POST) {
				$this->load->library('cart');
				$data = array(
					'from' => $this->input->post('from'),
					'id' => $this->input->post('id'),
					'name' => $this->input->post('title'),
					'qty' => $this->input->post('qty'),
					'price' => $this->input->post('price'),
					'length' => $this->input->post('length'),
					'size' => $this->input->post('size')
				);
				$this->cart->insert($data);
				$this->load->view('added', $data);
			} else {
				redirect('/Cart/', 'location');
			}
		}
		public function update() {
			$data = $_POST;
			$this->cart->update($data);
			
			redirect('Cart/', 'refresh');
		}
		public function remove($rowid) {
			$this->cart->update(array(
				'rowid' => $rowid,
				'qty' => 0
			));
			redirect('Cart/', 'location');
		}
		function process(){
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$address = $this->input->post('address');
			$city = $this->input->post('city');
			$state = $this->input->post('state');
			$zipcode = $this->input->post('zipcode');
			$email = $this->input->post('email');
			
			if ($_POST) {
				if ($firstname && $lastname && $address && $city && $state && $zipcode && $email) {
					foreach ($this->input->post('item_name') as $key => $value) {
						$item_id = $this->input->post('item_code')[$key];
						$product = $this->Product_model->get_product_details($item_id);
						
						//Assigning data to PayPal
						$this->paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($product->name);
						$this->paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($item_id);
						$this->paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($product->price);
						$this->paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='. urlencode($this->input->post('item_qty')[$key]);
						
						//Get price with quantity
						$subtotal = ($product->price * $this->input->post('item_qty')[$key]);
						$this->total = $this->total + $subtotal;
						
						//DON'T FORGET CHECK THIS CODE 
						$paypal_product['items'][] = array(
							'itm_name' => $product->name,
							'itm_price' => $product->price,
							'itm_code' => $item_id,
							'itm_qty' => $this->input->post('item_qty')[$key]
						);
						
						$from = "mchaeldonald62@gmail.com";
						$order_data = array(
							'product_id' => $item_id,
							'first_name' => $this->input->post('firstname'),
							'last_name' => $this->input->post('lastname'),
							'transaction_id' => 0,
							'qty' => $this->input->post('item_qty')[$key],
							'price' => $subtotal,
							'address' => $this->input->post('address'),
							'address2' => $this->input->post('address2'),
							'city' => $this->input->post('city'),
							'state' => $this->input->post('state'),
							'zipcode' => $this->input->post('zipcode'),
							'email' => $this->input->post('email')
						);
						
						//Add order data 
						$this->add_order($order_data);
						//Payment notification
						$msg = 'Pending Order: ' . $order_data['first_name'] . ' ' . $order_data['last_name'] . ' : ' . $product->name . ' ' . $product->price;
						mail('mchaeldonald62@gmail.com', 'Pending Order', $msg, 'From: ' . $from);
						mail('5135816638@vtext.com', 'Pending Order', $msg, 'From: ' . $from);
						
					}
					//Get grand total
					//HARDCODED VARIABLE SHIPPING
					$this->grand_total = $this->total + 3.99;
					
					//Create array of costs
					//HARDCODED VARIABLE SHIPPING
					$paypal_product['assets'] = array(
						'shipping_cost' => 3.99,
						'grand_total'   => $this->total
					);
					
					//Session Array For Later
					$_SESSION["paypal_products"] = $paypal_product;
					
					//Send Paypal Params
					$padata = 	'&METHOD=SetExpressCheckout'.
						//HARDCODED VARIABLE PAYPAL_RETURN_URL
						'&RETURNURL='.urlencode(echo base_url() + '/Cart/Process/').
						'&CANCELURL='.urlencode(echo base_url() + '/Cart/Cancel/').
						'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
						$this->paypal_data.
						'&NOSHIPPING=0'.
						'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($this->total).
						'&PAYMENTREQUEST_0_TAXAMT='.urlencode(0).
						//HARDCODED VARIABLE SHIPPING
						'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode(3.99).
						'&PAYMENTREQUEST_0_AMT='.urlencode($this->grand_total).
						//HARDCODED VARIABLE PAYPAL_CURRENCY_CODE
						'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode('USD').
						'&LOCALECODE=GB'. //PayPal pages to match the language on your website.
						'&LOGOIMG='. //Custom logo
						'&CARTBORDERCOLOR=FFFFFF'.
						'&ALLOWNOTE=1';
					
					//Execute "SetExpressCheckOut" 
					$httpParsedResponseAr = $this->PPHttpPost('SetExpressCheckout', $padata, 'mchaeldonald62_api1.gmail.com', 'JPRE4MVVAKCTKHU9', 'AiW68YUTw96ruYsBiY77APJtv1EiAYTSkip9l7CCeEDH8pTYp7PxElhN', 'live');
					
					//Respond according to message we receive from Paypal
					if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])){
						//Redirect user to PayPal store with Token received.
						$paypal_url ='https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
						//MIGHT NOT WORK-----------
						header('Location: '.$paypal_url);
					} else {
						//Show error message
						print_r($httpParsedResponseAr);
						die(urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]));			
					}
					
					//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
					if(!empty($this->input->get('token')) && !empty($this->input->get('PayerID'))){
						//we will be using these two variables to execute the "DoExpressCheckoutPayment"
						//Note: we haven't received any payment yet.
					
						$token = $this->input->get('token');
						$payer_id = $this->input->get('PayerID');
					
						//Get Session info
						$paypal_product = $_SESSION["paypal_products"];
						$this->paypal_data = '';
						$total_price = 0;
					
						//Loop Through Session Array
						foreach($paypal_product['items'] as $key => $item){
							$this->paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='. urlencode($item['itm_qty']);
							$this->paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($item['itm_price']);
							$this->paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($item['itm_name']);
							$this->paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($item['itm_code']);
					
							//Get Subtotal
							$subtotal = ($item['itm_price']*$item['itm_qty']);
					
							//Get Total
							$total_price = ($total_price + $subtotal);
						}
					
						$padata = 	'&TOKEN='.urlencode($token).
						'&PAYERID='.urlencode($payer_id).
						'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
						$this->paypal_data.
						'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($total_price).
						'&PAYMENTREQUEST_0_TAXAMT='.urlencode($paypal_product['assets']['tax_total']).
						'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($paypal_product['assets']['shipping_cost']).
						'&PAYMENTREQUEST_0_AMT='.urlencode($paypal_product['assets']['grand_total']).
						'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode);
					
						//Execute "DoExpressCheckoutPayment"
						//HARDCODED VARIABLE PAYPAL_API_USERNAME PAYPAL_API_PASSWORD PAYPAL_API_SIGNATURE PAYPAL_MODE
						$httpParsedResponseAr = $this->paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $paypal_api_username, $paypal_api_password, $paypal_api_signature, $paypal_mode);
					
						//Check if everything went ok..
						if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])){
							$data['trans_id'] = urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
							
							//Load View
							$this->load->view('purchased');
															
							$padata = 	'&TOKEN='.urlencode($token);
							$httpParsedResponseAr = $this->paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $paypal_api_username, $paypal_api_password, $paypal_api_signature, $paypal_mode);
						} else {
							die($httpParsedResponseAr["L_LONGMESSAGE0"]);
							echo '<pre>';
							print_r($httpParsedResponseAr);
							echo '</pre>';
						}
					}
				} else {
					redirect('/Order/Missing/', 'location');
				}
			} else {
				redirect('/Cart/', 'location');
			}
		}
		public function PPHttpPost($methodName_, $nvpStr_, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode) {
			//Set up your API credentials, PayPal end point, and API version.
			$API_UserName = urlencode($PayPalApiUsername);
			$API_Password = urlencode($PayPalApiPassword);
			$API_Signature = urlencode($PayPalApiSignature);
			
			//Currently in sandbox mode
			$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';
	
			$API_Endpoint = "https://api-3t".$paypalmode.".paypal.com/nvp";
			$version = urlencode('109.0');
		
			//Set the curl parameters.
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
			curl_setopt($ch, CURLOPT_VERBOSE, 1);
		
			//Turn off the server and peer verification (TrustManager Concept).
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
		
			//Set the API operation, version, and API signature in the request.
			$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";
		
			//Set the request as a POST FIELD for curl.
			curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
		
			//Get response from the server.
			$httpResponse = curl_exec($ch);
		
			if(!$httpResponse) {
				exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
			}
		
			//Extract the response details.
			$httpResponseAr = explode("&", $httpResponse);
		
			$httpParsedResponseAr = array();
			foreach ($httpResponseAr as $i => $value) {
				$tmpAr = explode("=", $value);
				if(sizeof($tmpAr) > 1) {
					$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
				}
			}
		
			if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
				exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
			}
		
			return $httpParsedResponseAr;
		}
		public function add_order($order_data) {
			$this->db->insert('order_data', $order_data);
		}
		public function cancel() {
			$this->load->view('cancel');
		}
	}
?>
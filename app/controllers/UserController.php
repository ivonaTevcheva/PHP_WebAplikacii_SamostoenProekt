<?php

	class UserController extends Controller{

		public function index(){			
			$items = $this->model('Product')->get();
			$this->view('user/index', ['items'=>$items]);
		}

		public function productdetail($product_id){
			$theProduct = $this->model('Product')->find($product_id);
			$thePictures = $this->model('Picture')->getForProduct($product_id);
			$theProduct->pictures = $thePictures;
			$this->view('user/productdetail', $theProduct);
		}

		public function addToCart($product_id){
			//cart is a link between a user and product
			//make sure there is a cart for the user
			$cart = $this->model('Order')->findUserCart($_SESSION['user_id']);
			if($cart == null){
				//make a cart
				$cart = $this->makeCart();
			}
			$newItem = $this->model('Order_detail');
			$newItem->order_id = $cart->order_id;
			$newItem->product_id = $product_id;
			$newItem->price = $this->model('Product')->find($product_id)->price;
			$newItem->qty = 1;//improvment needed later
			$newItem->create();
			header('location:/User/index/');
		}

		private function makeCart(){
			$cart = $this->model('Order');
			$cart->user_id = $_SESSION['user_id'];
			$cart->status = 'cart';
			$cart->order_id = $cart->create();
			return $cart;
		}

		public function viewCart(){
			$cart = $this->model('Order')->findUserCart($_SESSION['user_id']);
			if($cart == null){
				//make a cart
				$cart = $this->makeCart();
			}
			$items = $this->model('Order_detail')->getForOrder($cart->order_id);
			$this->view('user/cart', $items);
		}

		public function removeFromCart($order_detail_id){
			$item = $this->model('Order_detail')->find($order_detail_id);
			$order = $this->model('Order')->find($item->order_id);
			if($order->user_id == $_SESSION['user_id'])
				$item->delete();
			header('location:/User/viewCart');
		}

		public function checkout(){
			//get payment
			//on payment set the cart to the paid status
			$cart = $this->model('Order')->findUserCart($_SESSION['user_id']);
			$cart->payment_id = 'somepaymentId';
			$cart->status = 'paid';
			$cart->update();
			//modify the inventory quantities
			header('location:/User/index');
		}

	}
?>
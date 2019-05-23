<?php
  class Orders extends Controller{
    public function __construct(){
// if(!isset($_SESSION['user_id'])){ // redirect('users/login'); // }
      // Load Models
      $this->orderModel = $this->model('Order');
    
    }
      // Load all orders
      // MY ORDERS page
      public function index(){
          $orders = $this->orderModel->getOrders();
          $shiny = $this->orderModel->sumShiny();
          $data = [
          'orders'=> $orders,
          'shiny' => $shiny
          ];
          // Load My orders view
         
          $this->view('orders/index',$data);
      }

            // submitOrder page
      public function submitOrder(){
           
      // Set Data
          $data = [
          'title'=>'Submit order',
          'description'=>'Here you can submit your order'
          ];
      // Load My orders view
          $this->view('orders/submit',$data);
      }
      
          // Add Order
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
           
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'email' => trim($_POST['email']),
          'phone' => trim($_POST['phone']),
          'user_id' => $_SESSION['user_id'],   
          'street' => trim($_POST['street']), 
          'city' => trim($_POST['city']), 
          'zip' => trim($_POST['zip']), 
            
          'email_err' => '',
          'phone_err' => ''
        ];

         // Validate email
         if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
          // Validate name
          if(empty($data['phone'])){
            $data['phone_err'] = 'Please enter the phone';
          }
        }

        // Make sure there are no errors
        if(empty($data['email_err']) && empty($data['phone_err'])){
          // Validation passed
          //Execute
             
          if($this->orderModel->addOrder($data)){
          
            // Redirect to login
            flash('post_added', 'Post Added');
            redirect('orders');
        //    return true;
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('orders/submit', $data);
        }

      } else {
        $data = [
          'email' => '',
          'phone' => '',
        ];
          return true;
      //  $this->view('orders/submit', $data);
      }
    }
          //----------- Edit Order-------------------
    public function edit($id){
      //  die($id);
   //    print_r($_SERVER['REQUEST_METHOD']);
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
       //   die($_SERVER['REQUEST_METHOD']);
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
        $data = [
          'id' => $id,
          'email' => trim($_POST['email']),
          'phone' => trim($_POST['phone']),
          'user_id' => $_SESSION['user_id'],   
          'street' => trim($_POST['street']), 
          'city' => trim($_POST['city']), 
          'zip' => trim($_POST['zip']), 
            
          'email_err' => '',
          'phone_err' => ''
        ];
  
         // Validate email
         if(empty($data['email'])){
          $data['email_err'] = 'Please enter name';
          // Validate name
          if(empty($data['phone'])){
            $data['phone_err'] = 'Please enter the post body';
          }
        }

        // Make sure there are no errors
        if(empty($data['email_err']) && empty($data['phone_err'])){
          // Validation passed
          //Execute
            
          if($this->orderModel->updateOrder($data)){
            
          // Redirect to login
          flash('post_message', 'Post Updated');
          redirect('orders');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          
          $this->view('orders/edit', $data);
        }

      } else {
        // Get post from model
        $order = $this->orderModel->getOrderById($id);
         
        // Check for owner
        if($order->user_id != $_SESSION['user_id']){
          redirect('orders');
        }

        $data = [
          'id' => $id,
          'firstName' => $order->firstName,
          'email' => $order->email,
          'phone' => $order->phone,
          'street' =>$order->street,
          'city' =>$order->city,
          'zip' => $order->zip
        ];
        //  die($data['email']);
        $this->view('orders/edit', $data);
      }
    }

  }
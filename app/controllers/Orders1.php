<?php
  class Orders1 extends Controller{
    public function __construct(){
        
// if(isset($_SESSION)){ // $session_id = $_SESSION['user_id']; // // }else{ // // $session_id = session_regenerate_id() ; // session_start(); // // // } // die($session_id);
      // Load Models
      $this->orderModel = $this->model('Order1');
    
    }
      // Load all orders
      //MY ORDERS page
      public function index(){
      $orders = $this->orderModel->getOrders();
          
      $data = [
      'orders'=>$orders
      ];
      // Load MY ORDERS view
          $this->view('orders/index',$data);
      }



      
          // Add Order
    public function add(){
        
        
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
         
          // Prepare values from js associativa array
// $extOptions = $_POST['extOptions']; // $array = json_decode($extOptions,true);
         
        // Sanitize POST
           
           
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          
        $data = [
    
          'firstName' =>trim($_POST['firstName']),
          'lastName' =>trim($_POST['lastName']),
          'email' => trim($_POST['email']),
          'phone' => trim($_POST['phone']),
          'user_id' => $session_id,  
          'street' => trim($_POST['street']), 
          'city' => trim($_POST['city']), 
          'zip' => trim($_POST['zip']), 
          'date' => trim($_POST['date']), 
          'time' => trim($_POST['time']), 
          'room' => trim($_POST['room']), 
          'restroom' => trim($_POST['restroom']),
          'windows' => trim($_POST['windows']),
          'refregirator' => trim($_POST['refregirator']),
          'oven' => trim($_POST['oven']),
          'moveIn' => trim($_POST['moveIn']),
          'heavy' => trim($_POST['heavy']),
          'green' => trim($_POST['green']),
          'price' => trim($_POST['price']),

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
        if(empty($data['email_err']) && empty($data['phone_err'])) {
          // Validation passed
          //Execute
             
          if($this->orderModel->addOrder($data)){
          
            // Redirect to login
            flash('post_added', 'Post Added');
           // redirect('orders');
        //    return true;
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('orders/add', $data);
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

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
        $data = [
          'id' => $id,
          'firstName' =>trim($_POST['firstName']),
          'lastName' =>trim($_POST['lastName']),
          'email' => trim($_POST['email']),
          'phone' => trim($_POST['phone']),
          'user_id' => $_SESSION['user_id'],   
          'street' => trim($_POST['street']), 
          'city' => trim($_POST['city']), 
          'zip' => trim($_POST['zip']), 
          'date' => trim($_POST['date']), 
          'time' => trim($_POST['time']), 
            
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
        // Show in the edit form
        $order = $this->orderModel->getOrderById($id);
         
        // Check for owner
        if($order->user_id != $_SESSION['user_id']){
          redirect('orders');
        }

        $data = [
          'id' => $id,
          'firstName' => $order->firstName,
          'lastName' => $order->lastName,
          'email' => $order->email,
          'phone' => $order->phone,
          'street' =>$order->street,
          'city' =>$order->city,
          'zip' => $order->zip,
          'date' => $order->date,
          'time' => $order->time
            
        ];
         // die($data['email']);
        $this->view('orders/edit', $data);
      }
    }


  }
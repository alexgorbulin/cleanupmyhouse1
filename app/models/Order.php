<?php
  class Order {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }

    // Get All Orders
    public function getOrders(){
        $userId = $_SESSION['user_id'];
        
        $this->db->query("SELECT *,
                         orders.id AS orderId,
                         orders.email AS orderEmail
                         FROM orders 
                         INNER JOIN users ON orders.user_id = users.id 
                         WHERE users.id = $userId;");
        
        $results = $this->db->resultset();
       

      return $results;
    }
    // --------------Get Order By ID---------------
    public function getOrderById($id){
      $this->db->query("SELECT * FROM orders WHERE id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }
      
    //--------- Count Shiny------------
      public function sumShiny(){
          $userId = $_SESSION['user_id'];
        
          $this->db->query("SELECT users.id AS userID, SUM(shiny) AS totalShiny
                            FROM orders 
                            INNER JOIN users ON orders.user_id = users.id WHERE users.id =  $userId;");
       //   $this->db->bind(':id', $id);
$results = $this->db->resultset();
       

      return $results;
      
      }
    // -------------Add Order---------------
    public function addOrder($data){
      // Prepare Query
       
      $this->db->query('INSERT INTO orders (email, user_id, phone, street, city, zip) 
      VALUES (:email,:user_id, :phone, :street, :city, :zip)');

      // Bind Values
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':street', $data['street']);
      $this->db->bind(':city', $data['city']);
      $this->db->bind(':zip', $data['zip']);
       
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
      //--------Update Order--------
      public function updateOrder($data){
            // Prepare Query
          
      $this->db->query('UPDATE orders SET firstName = :firstName, email = :email, phone = :phone, street = :street, city = :city, zip = :zip WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':firstName', $data['firstName']); 
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':street', $data['street']);
      $this->db->bind(':city', $data['city']);
      $this->db->bind(':zip', $data['zip']);
      
      //Execute
      if($this->db->execute()){
         
        return true;
      } else {
        return false;
      }
      }
  }
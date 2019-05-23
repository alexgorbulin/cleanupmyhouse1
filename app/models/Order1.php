<?php
  class Order1 {
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
    
        // Check if its a guest order or existed user '9' - is guest
        if($_SESSION['user_id'] ==''){ 

      $data['user_id'] = '9'; 
 }else {
        $data['user_id'] = $_SESSION['user_id'];
        }
        
        

      $this->db->query('INSERT INTO orders (lastName,firstName,email, user_id, phone, street, city, zip, date, time, room, restroom, windows, refregirator, oven, moveIn, heavy, green, price) 
      VALUES (:lastName,:firstName,:email,:user_id, :phone, :street, :city, :zip, :date, :time, :room, :restroom, :windows, :refregirator, :oven, :moveIn, :heavy, :green, :price)');

      // Bind Values
    
        
      $this->db->bind(':firstName', $data['firstName']);
      $this->db->bind(':lastName', $data['lastName']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':street', $data['street']);
      $this->db->bind(':city', $data['city']);
      $this->db->bind(':zip', $data['zip']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':time', $data['time']);
      $this->db->bind(':room', $data['room']);
      $this->db->bind(':restroom', $data['restroom']);
      $this->db->bind(':windows', $data['windows']);
      $this->db->bind(':refregirator', $data['refregirator']);
      $this->db->bind(':oven', $data['oven']);
      $this->db->bind(':moveIn', $data['moveIn']);
      $this->db->bind(':heavy', $data['heavy']);
      $this->db->bind(':green', $data['green']);
      $this->db->bind(':price', $data['price']);
      
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
          
      $this->db->query('UPDATE orders SET firstName = :firstName, lastName = :lastName, email = :email, phone = :phone, street = :street, city = :city, zip = :zip, date = :date, time = :time WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':firstName', $data['firstName']);   
      $this->db->bind(':lastName', $data['lastName']);   
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':street', $data['street']);
      $this->db->bind(':city', $data['city']);
      $this->db->bind(':zip', $data['zip']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':time', $data['time']);
      //Execute
      if($this->db->execute()){
         
        return true;
      } else {
        return false;
      }
      }
  }
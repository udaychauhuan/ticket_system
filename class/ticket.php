<?php

class Ticket
{

   public  function __construct()
   {
   }
   //create ticket
   public function create_ticket($data)
   {
      $tk_name = $data['tk_name'];
      $tk_desc = $data['tk_desc'];
      $tk_price = $data['tk_price'];
      $sql = "INSERT INTO `ticket_table`( `ticket_name`, `Ticket_desk`, `price`) VALUES ('$tk_name','$tk_desc','$tk_price')";
      $conn = new Connection();
      $result = $conn->save($sql);
      if ($result) {
         # code...
         return true;
      } else {
         return false;
      }
   }
   //update ticket
   public function update_ticket($data, $id)
   {
      $tk_name = $data['tk_name'];
      $tk_desc = $data['tk_desc'];
      $tk_price = $data['price'];
      $sql = "UPDATE `ticket_table` SET `ticket_name`='$tk_name',`Ticket_desk`='$tk_desc',`price`='$tk_price' WHERE ticket_id = $id";
      $conn = new Connection();
      $result = $conn->save($sql);
      if ($result) {
         # code...
         return true;
      } else {
         return false;
      }
   }
   // delete ticket
   public function delete_Ticket($id)
   {
      $conn = new Connection;
      //checking that user purchas  anny thing or not;
      $sql1 = "SELECT * FROM `purchase_table` WHERE `ticket_id` = $id";
      $result1 = $conn->read($sql1);
      if (!$result1) {
        $sql = "DELETE FROM `ticket_table` WHERE ticket_id = $id";
        $result = $conn->save($sql);
        if ($result) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
   }
   // view one ticket
   public function view_one_ticket()
   {
   }
   // view all ticket
   public function view_All_ticket()
   {
      ///its done
   }

   //suggetion to delete ticket
   public function seg_to_del_ticket()
   {
   }
}

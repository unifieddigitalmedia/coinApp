<?php
 

class Denomination

{



 
 public function setDenomination($denomiation,$amount)

  {
  
      $this->$denomiation = $amount;

  }

 
  public function getDenomination($denomiation)

  {
  
      return $this->$denomiation;
      
  }



}


 
?>
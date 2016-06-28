<?php


include 'phpFunctions/functions.php';

include 'phpClasses/classes.php';

include 'phpVariables/variables.php';

$denominatorObj = new Denomination;


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["getDenominations"]))  {


$amt = validateAmount($_REQUEST[amount]);

if (gettype($amt) === "integer"){


foreach ($denominators as $denominator) {

   $denomination = $denominator[value]*100;

   $result = explode('.',($amt / $denomination ));
    
   $answer = $result[0];

   $amt = fmod($amt,$denomination);

   $denominatorObj->setDenomination($denominator[denominator],$result[0]);


}




$error = "";



} else {



$error =  "Cannot calculate non pound or non pence values";




}



}

 

?>

<!DOCTYPE html>

<head>
    
<title>Coins App Demoninations</title>

<link rel="stylesheet" href="styles/styles.css">

</head>

<body>
      
         <h1>Coin App</h1>

<main> 

   <p> This PHP application validates a given number of pennies and will calculate the minimum number of Sterling coins needed to make that amount.</p>
   
   <p>Eg. 123p = 1 x £1, 1 x 20p, 1 x 2p, 1 x 1p</p>

<form name = "coinFrom" method="get" action="denominations.php" onsubmit="return validateForm()"> 

    <p> 
        <label for="name">Amount:</label> 
        <input id="amount" name="amount"> 
    </p> 
    
    <button type="submit" value="Send" name="getDenominations" >Get Denominations</button> 

</form>




<section id="light" class="whiteContent" style="display:none" >

<span class="close">Close</span>
<p> Below is the number of pennies needed to calculate the minimum number of Sterling coins for the amount <span id="amountDisplay"> </span></p>
<p>Eg. 123p = 1 x £1, 1 x 20p, 1 x 2p, 1 x 1p </p>
<span id="formerror"> </span>


</section>
      
<section id="fade" class="blackOverlay" style="display:none"  >




</section>

</main>

<footer>  php+js coin exercise completed by Machel Slack - Monday June 27th 2016 </footer>

    <section id="light" class="whiteContent">
<span class="close">Close</span>
<p> Below is the number of pennies needed to calculate the minimum number of Sterling coins for the amount <?php  echo $_REQUEST[amount]; ?> </p>
<p>Eg. 123p = 1 x £1, 1 x 20p, 1 x 2p, 1 x 1p </p>
<span class="errorMessage"><p> <?php  echo $error; ?></p> </span>
<table >
  <tr>
    <td>£2</td>
    <td>£1</td> 
    <td>.50p</td>
    <td>.20p</td>
    <td>.10p</td>
    <td>.05p</td>
    <td>.02p</td>
    <td>.01p</td>
  </tr>
  <tr>
    <td><?php  echo $denominatorObj->getDenomination("twoPounds"); ?></td>
    <td><?php  echo $denominatorObj->getDenomination("onePound"); ?></td> 
    <td><?php  echo $denominatorObj->getDenomination("fiftyPence"); ?></td>
    <td><?php  echo $denominatorObj->getDenomination("twentyPence"); ?></td>
    <td><?php  echo $denominatorObj->getDenomination("tenPence"); ?></td> 
    <td><?php  echo $denominatorObj->getDenomination("fivePence"); ?></td>
    <td><?php  echo $denominatorObj->getDenomination("twoPence"); ?></td>
    <td><?php  echo $denominatorObj->getDenomination("onePence"); ?></td>
  </tr>
</table>



      </section>
      
      <section id="fade" class="blackOverlay">




      </section>
   
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.2.min.js"></script>

<script src="/scripts/scripts.js"></script>

   </body>
</html>

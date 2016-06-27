<?php


include 'phpFunctions/functions.php';

include 'phpClasses/classes.php';

include 'phpVariables/variables.php';

$denominatorObj = new Denomination;


if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["getDenominations"]))  {


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



$error = "Cannot calculate non pound or pence values. Please see table for acceptable amounts";




}



}

 

?>

<!DOCTYPE html>

<head>
    
<title>Coins App Demoninations</title>

<link rel="stylesheet" href="styles/styles.css">

</head>

<body>
      

    <section id="light" class="whiteContent">

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
   
   </body>
</html>

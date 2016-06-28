<?php


include '../phpFunctions/functions.php';

include '../phpClasses/classes.php';

include '../phpVariables/variables.php';

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




$html .= '<table >
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
    <td>'.$denominatorObj->getDenomination("twoPounds").'</td>
    <td>'.$denominatorObj->getDenomination("onePound").'</td> 
    <td>'.$denominatorObj->getDenomination("fiftyPence").'</td>
    <td>'.$denominatorObj->getDenomination("twentyPence").'</td>
    <td>'.$denominatorObj->getDenomination("tenPence").'</td> 
    <td>'.$denominatorObj->getDenomination("fivePence").'</td>
    <td>'.$denominatorObj->getDenomination("twoPence").'</td>
    <td>'.$denominatorObj->getDenomination("onePence").'</td>
  </tr>
</table>';



echo json_encode($html, JSON_UNESCAPED_UNICODE );

//echo $purse;



}else {


$html .= '<span class="errorMessage"><p>Cannot calculate non pound or pence values. Please see table for acceptable amounts</p> </span>
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
    <td>'.$denominatorObj->getDenomination("twoPounds").'</td>
    <td>'.$denominatorObj->getDenomination("onePound").'</td> 
    <td>'.$denominatorObj->getDenomination("fiftyPence").'</td>
    <td>'.$denominatorObj->getDenomination("twentyPence").'</td>
    <td>'.$denominatorObj->getDenomination("tenPence").'</td> 
    <td>'.$denominatorObj->getDenomination("fivePence").'</td>
    <td>'.$denominatorObj->getDenomination("twoPence").'</td>
    <td>'.$denominatorObj->getDenomination("onePence").'</td>
  </tr>
</table>';

$purse = array(

      "ERROR" => "Cannot calculate non pound or non pence values."
     
      );

echo json_encode($html, JSON_UNESCAPED_UNICODE );



}
 

 }

?>
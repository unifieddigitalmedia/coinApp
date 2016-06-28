<?php

function validateAmount($amount)

/*

function that validates whether the amount parameter is a string and meets the criterias set out in table below.


---------------------------------------------------------------------
| 		INPUT 		| 		PENCE 		| 		DESCRIPTION 		|
---------------------------------------------------------------------
|  4    			|   4   			|single digit 				|
---------------------------------------------------------------------
|  85   		    |   85   			|double digit 				|
---------------------------------------------------------------------
|  197p  			|   197   			|pence symbol 				|
---------------------------------------------------------------------
|  2p   			|   2   			|pence symbol single digit  |
---------------------------------------------------------------------
|  1.87   		    |   187  			|pounds decimal 			|
---------------------------------------------------------------------
|  £1.23   			|   123  			|pound symbol 				|
---------------------------------------------------------------------
|  £2   			|   200   			|single digit pound symbol  |
---------------------------------------------------------------------
|  £10    			|   1000  			|double digit pound symbol  |
---------------------------------------------------------------------
|  £1.87p    		|   187  			|pounds and pence symbol    |
---------------------------------------------------------------------
|  £1.p     	    |   100             |missing pence but present decimal place  |
---------------------------------------------------------------------
|  001.41p    		|   141   			| buffering zeros           |
---------------------------------------------------------------------
|  4.235p   		|   424   			|rounding three decimals place to two |
---------------------------------------------------------------------
|  £1.257422457p    |   126  			| rounding with symbols     |
---------------------------------------------------------------------

*/



  {
      

/*Regex patterns are used with php's preg_match function to determine whether amount submitted is a pence or pound value*/

$poundPattern = "/(^£\d+[.][p]$)|(^£\d+[p]$)|(^\d+[.]\d+$)|(^\d+$)|(^£\d+[.]\d+[p]$)|(^[£]\d+[p]$)(^£\d+[.][p]$)|(^£\d+[.]\d+$)|(^£\d+$)|(^\d+[.][p]$)|(^£\d+[.]$)|(^0+\d+[.]\d+$)|(^0+\d+[.]\d+[p]$)|(^\d+[.]\d+[p]$)/";

$pencePattern = "/(^[.]\d+[p]$)|(^\d+[p]$)|(^[.]\d+$)/";


if (preg_match($pencePattern,$amount) == 1 ){

/*php's explode function is used to separte pound value from pence value */

$pattern = "/[£]|[p]|[,]/";

$amount = preg_replace($pattern,"",$amount);

$amount = explode(".",round($amount,2));


/*php's preg_replace function is used to strip any comma characters and intval is used to covert to string value to an integer value for arthimetic calculations */


 return $amount[1] + (intval(preg_replace($pattern,"",$amount[0])) );


} else if(preg_match($poundPattern,$amount) == 1 ){



$pattern = "/[£]|[p]|[,]/";

$amount = preg_replace($pattern,"",$amount);

$amount = explode(".",round($amount,2));

return $amount[1] + (intval(preg_replace($pattern,"",$amount[0])) * 100 );


}

else {


 return "a Not match";


}


  
  }



?>


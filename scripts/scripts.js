$(document).ready(function(){


  
  

/*Jquery is being used to display the result of the loaded data passed back by GET request */


$("form").submit(function(){




var xhttp = new XMLHttpRequest();

 xhttp.onreadystatechange = function() {
    
  
    if (xhttp.readyState == 4 && xhttp.status == 200) {
    


    document.getElementById("formerror").innerHTML = JSON.parse(xhttp.responseText)

    document.getElementById("amountDisplay").innerHTML = document.getElementById("amount").value;

/*Jquery is being used to change the css style element of html lightbox */

    $(".whiteContent").css("display","block");

    $(".blackOverlay").css("display","block");

    
    }
  
  };

  xhttp.open("GET", "../api/denominations.php?amount="+document.getElementById("amount").value+"&getDenominations=Send", true);
  
  xhttp.send();

 return false;

});
    

 /*Jquery is being used to change the css style element of html lightbox during the response of a click event fired by a span tag */

$( ".whiteContent , .blackOverlay , .close " ).click(function() {

	$(".whiteContent").css("display","none");

    $(".blackOverlay").css("display","none");

})

       
    
    });


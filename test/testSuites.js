describe('Coin App Tests',function() {
  
  
it("should validate that amount entered is a pence value", function() {

var amount = ".23p" ;

  var pencePattern = /(^[.]\d+[p]$)|(^\d+[p]$)|(^[.]\d+$)/g;
  

    expect(pencePattern.test(amount)).toBe(true);
  

  });


it("should validate that amount entered is a pound value", function() {



  var amount = "£1p" ;

  //var poundPattern = /(^[£]\d+$)(^\d+[.]\d+$)|(^\d+$)|(^[£]\d+[.]\d+[p]$)|(^[£]\d+[.][p]$)|(^[£]\d+[.]\d+$)|(^[£]\d+$)|(^\d+[.][p]$)|(^[£]\d+[.]$)|(^0+\d+[.]\d+$)|(^0+\d+[.]\d+[p]$)|(^\d+[.]\d+[p]$)/g;
  

  var poundPattern = /(^£\d+[.][p]$)|(^£\d+[p]$)|(^\d+[.]\d+$)|(^\d+$)|(^£\d+[.]\d+[p]$)|(^[£]\d+[p]$)(^£\d+[.][p]$)|(^£\d+[.]\d+$)|(^£\d+$)|(^\d+[.][p]$)|(^£\d+[.]$)|(^0+\d+[.]\d+$)|(^0+\d+[.]\d+[p]$)|(^\d+[.]\d+[p]$)/g;

    expect(poundPattern.test(amount)).toBe(true);
  

  });


 
  
});
 function validatePost(){

 	var phoneNum = document.getElementById("contact#").value;
 	if (! /^[0-9]{11}$/.test(phoneNum)) {
 		alert("Please input 11 Phone numbers without dashes!");
 	}
 	else{
 		document.getElementById('btnsubmitpost').click();
 	}
 }
 function dropDownC() {
    document.getElementById("dropDownCategories").classList.toggle("show");
}
 function dropDownO() {
    document.getElementById("dropDownOptions").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('#btnOptions')) {

    var dropdowns = document.getElementsByClassName("dropDown-contentO");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
    if (!event.target.matches('#btnCategories')) {

    var dropdowns = document.getElementsByClassName("dropDown-contentC");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }

}
 function validatesignup(){
 	var stat=true;
	var pass=document.getElementById("su-password").value;
 	var pass1=document.getElementById("su-passwordc").value;
 	var phoneNum = document.getElementById("su-contact#").value;
 	if (! /^[0-9]{11}$/.test(phoneNum)) {
 		stat=false;
 		alert("Please input 11 digit Phone numbers without dashes!");
 	}
 	if(stat){
 		if(pass1==pass){
 			document.getElementById("signupform").submit();
 		}
 		else{
 			alert("The two passwords does not match!");
 		}
 	}
 	
 }
 function validatePost1(){

 	var phoneNum = document.getElementById("contact#").value;
 	if (! /^[0-9]{11}$/.test(phoneNum)) {
 		alert("Please input 11 Phone numbers without dashes!");
 	}
 	else{
 		document.getElementById('btnsubmitpost').click();
 	}
 }
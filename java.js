/*
function popitup(url) {
newwindow=window.open(url,'name','height=600,width=500');
if (window.focus) {newwindow.focus()}
return false;
}
*/

$ = function(id) {
  return document.getElementById(id);
}

var show = function(id) {
  var pop = $(id);
  pop.style.display ='block';

}

var hide = function(id) {
  $(id).style.display ='none';
}

document.contactform.onsubmit=function()
{
  var emailID = document.contactform.email.value;
  atpos = emailID.indexOf("@");
  dotpos = emailID.lastIndexOf(".");

  if(document.contactform.fullname.value=="")
  {
    alert("Vul alstublieft uw naam in");
    document.contactform.fullname.focus();
    return false;
  }
  else if(document.contactform.email.value=="")
  {
    alert("Vul alstublieft uw e-mailadres in");
    document.contactform.email.focus();
    return false;
  }
  else if (atpos < 1 || ( dotpos - atpos < 2 ))
  {
    alert("Vul alstublieft een juist emailadres in.")
     document.contactform.email.focus() ;
    return false;
  }
  else if(document.contactform.message.value=="")
  {
    alert("Schrijf alstublieft een bericht zodat ik u beter kan helpen");
    document.contactform.message.focus();
    return false;
  }
  return true;
}

//https://www.tutorialspoint.com/javascript/javascript_form_validations.htm

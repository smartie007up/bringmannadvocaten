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
  if(document.contactform.fullname.value=="")
  {
    alert("Vul alstublieft uw naam in");
    document.contactform.fullname.focus();
    return false;
  }
  else if(document.contactform.email.value=="")
  {
    alert("Vul alstublieft uw naam in");
    document.contactform.email.focus();
    return false;
  }
  return true;
}

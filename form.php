<?php

//check if form is submitted
if(empty($_POST['submit']))
{
  echo "Het formulier is niet verzonden.";
  exit;
}




if(empty($_POST['fullname'] ||
  empty($_POST['email'])))
{
  echo "Vul alstublieft het formulier (volledig) in.";
  exit;
}

// define variables and set to empty values
$name = $_POST["fullname"];
$email = $_POST["email"];


mail('marthegeman@gmail.com','Nieuw mailbericht van de website'),'Nieuw bericht:
$name, Email:$email');

header('Location: thank-you.html');



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

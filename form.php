<?php

$headers = "From: PB@" . $_SERVER['SERVER_NAME'] . "\r\n";

//check if form is submitted
if(empty($_POST['submit']))
{
  echo "Het formulier is niet verzonden.";
  exit;
}

// if($_SERVER["REQUEST_METHOD"] == "POST")
// {
//   if(empty($_POST['fullname'] ||
//   empty($_POST['email'])))
//   {
//     echo "Vul alstublieft het formulier (volledig) in.";
//     exit;
//   }
//   else {
//       $name = $_POST["fullname"];
//       $email = $_POST["email"]
//       $message = $_POST["message"]
//       exit;
//   }
// }

if(empty($_POST['fullname'] ||
  empty($_POST['email'])))
{
  echo "Vul alstublieft het formulier (volledig) in.";
  exit;
}

//define variables and set to empty values
$name = $_POST["fullname"];
$email = $_POST["email"];
$message = $_POST["message"];

$to = 'pb@bringmannadvocaten.nl';
$onderwerp = 'Ingevuld contactformulier';
$bericht = "\n Van: $name \n \n E-Mailadres: $email \n \n Bericht: $message";

mail($to,$onderwerp,$bericht, "From: $email");

header('Location: thank-you.html');

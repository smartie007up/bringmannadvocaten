<?php

// define variables and set to empty values
$name_error = $email_error = $message_error = "";
$name = $email = $gender = $message = $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error .= "\n Error: Naam is een verplicht veld";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error .= "\n Alleen letters en spaties toegestaan";
    }
  }

  if (empty($_POST["email"])) {
    $email_error .= "\n Error: Email is een verplicht veld";
  }  else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error .= "\n Ongeldige email opmaak";
    }
  }

  if (empty($_POST["gender"])) {
    $gender = "";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }




  /*
  if ($name_error == '' and $email_error == '' and $gender_error == ''){
  $message_body = '';
  unset($_POST['submit']);
  foreach ($_POST as $key => $value){
  $message_body .=  "$key: $value\n";
}

$to = 'marthegeman@gmail.com';
$subject = 'Ingevuld contactformulier';
if (mail($to, $subject, $message)){
$success = "Uw bericht is verzonden, bedankt!";
//echo "Uw bericht is verzonden, bedankt!";
$name = $email = $gender = $message = '';

}
}
*/

if(isset($_POST['submit'])){
  if (!empty($name_error == '' || $email_error == '' || $gender_error == '')){
    unset($_POST['submit']);
  }
  else if(empty($name_error) and empty($email_error) and empty($gender_error)){
    $to = $ontvanger;
    $onderwerp = "Contactformulier van: $name";
    $text = "Van: $name \n E-Mail: $email \n Bericht: \n $message";

    if (mail($to,$onderwerp,$text)) {
      $success = "Uw bericht is verzonden, bedankt!";
      $name = $email = $gender = $message = '';
    } else {
      echo "<p>Something went wrong, go back and try again!</p>";
    }
    //redirect to the 'thank you' page
    //  header('Location: index.html');
  }
}



}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

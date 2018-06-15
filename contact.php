<?php

// define variables and set to empty values
$name = $email = $gender = $message = "";
$ontvanger = 'marthegeman@gmail.com';
$errors = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //variabelen heten: name, email, gender, message, reset en submit
  $name = verify($_POST['name']);
  $email = verify($_POST['email']);
  $gender = verify($_POST['gender']);
  $message = verify($_POST['message']);

  if(isset($_POST['submit'])){
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])){
      $errors .= "\n Error: Niet alle velden zijn ingevuld";
      //  show_error($errors);
      echo "  $errors ";
    }
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",$ontvanger)){
      $errors .= "\n Error: Ongelding e-mailadres";
      echo "$errors";
    }
  }
}

if(isset($_POST['submit'])){
  if(empty($errors)){
    $to = $ontvanger;
    $onderwerp = "Contactformulier van: $name";
    $text = "Van: $name \n E-Mail: $email \n Bericht: \n $message";

    if (mail($to,$onderwerp,$text)) {
      echo "<p>Your message has been sent!</p>";
    } else {
      echo "<p>Something went wrong, go back and try again!</p>";
    }
    //  mail($to,$onderwerp,$text);
    //redirect to the 'thank you' page
    //  header('Location: index.html');
  }
}

// Check for all variables that they are okay
function verify($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function show_error($myError)
{
  ?>
  <html>
  <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

  </body>
  </html>
  <?php
  exit();
}

?>

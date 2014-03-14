<?php

$link="index.html"; // indica la pagina che vuoi che venga rindirizato una volta fatta la registrazione

// Create connection
$con=mysqli_connect("localhost","user","password","mio_database"); //setta la connessione del database
// Controllo connessione
if (mysqli_connect_errno())
  {
  echo "connessione fallita al MySQL: " . mysqli_connect_error();
  }

if(isset($_GET['user'])){
if(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM iscritti where username='$_GET[user]'"),MYSQLI_ASSOC)){
  echo "false";
  }else{
  echo "true";
  }
}

if(isset($_GET['email'])){
if(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM iscritti where email='$_GET[email]'"),MYSQLI_ASSOC)){
  echo "false";
  }else{
  echo "true";
  }
}

if(isset($_POST['iscrizione'])){

if((strlen($_POST['nome'].$_POST['cognome'].$_POST['user'].$_POST['password'].$_POST['email'].$_POST['numero']))>370){ exit("stringa troppo lunga");}

if(!preg_match("/^[A-Za-z ]+$/", $_POST['nome'])){exit("caratteri consentiti: minuscoli, maiuscoli dalla a alla z");}

if(!preg_match("/^[A-Za-z']+$/", $_POST['cognome'])){exit("caratteri consentiti: minuscoli, maiuscoli dalla a alla z o apice");}

if(!preg_match("/^[a-zA-Z0-9]+$/", $_POST['user'])){exit("caratteri consentiti: minuscoli, maiuscoli dalla a alla z o numeri");}

if((!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST['email']))&&(!preg_match("/^[a-zA-Z0-9@.]+$/",$_POST['email']))){ exit("solo lettere minuscole maiuscole e . @");}

if(!preg_match("/^[0-9]+$/", $_POST['numero'])){exit("sono consentiti solo numeri");}

if(mysqli_query($con,"INSERT INTO iscritti VALUES (NULL,'$_POST[nome]','".addslashes($_POST['cognome'])."','$_POST[user]','$_POST[password]','$_POST[email]','$_POST[numero]')"))
{
  unset($_POST['iscrizione']);
  }
  
  header("location: ".$link);
  }
    mysqli_close($con);
  
?>

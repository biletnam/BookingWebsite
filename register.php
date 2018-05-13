<?php
include('db_login.php');

$mysqli = new mysqli($db_host,$db_username,$db_password,$db_name)or die($mysqli->error);

if($mysqli->connect_errno){
  echo $mysqli->connect_errno;
  echo $mysqli->connect_error;
}
//récupérer les données du formulaire
$doj = strip_tags($_POST['journey_date']);
$name = strip_tags( $_POST['user_name']);
$address = strip_tags( $_POST['address']);
$mobile = strip_tags( $_POST['mobile']);
$userid = strip_tags( $_POST['userid']);
$email = strip_tags( $_POST['email']);
$password = strip_tags( $_POST['password']);
$message = strip_tags( $_POST['message']);
//tester les champs du formulaire s'il sont vides ou non
if (empty($name))
    $error = 'You must enter your name.';

if (empty($address))
    $error = 'You must enter your address.';

if (empty($mobile))
    $error = 'You must enter your mobile number.';

if (empty($userid))
    $error = 'You must enter your user id.';

if (empty($email))
    $error = 'You must enter your email address.';

if (empty($password))
    $error = 'You must enter password.';

//tester si l'utilisateur existe déjà dans la base de donnée
$select = mysqli_query($mysqli,"select * from register where userid = '" . $userid . "'");

$num_rows = mysqli_num_rows($select);

if ( $num_rows )
	$error = 'You are already registered.';
//tester le resultat des testes s'il existe une erreur on retourne l'utilisateur avec une erreur à la page du formulaire
if (isset($error)) {
    header('Location: book.php?e='.urlencode($error)); exit;
}

//sinon on insert les données à la base de donnée de cette maniére
$query = "INSERT INTO register (userid, name, email, password, address, contact, message) VALUES ('" . $userid . "','" . $name . "','" . $email . "','" . $password . "','" . $address . "','" . $mobile . "','" . $message . "')";

$results = mysqli_query($mysqli,$query);

if (!$results)
{
	die ("Impossible d'insérer dans le registre: <br />". mysqli_error($mysqli));
}

$seatNumber = NULL;

for($i=1; $i<11; $i++)
{
	$chparam = "ch" . strval($i);
	$calcPNR = $doj . "-" . strval($i);
	if( !empty($_POST[$chparam]) )
	{
		$query = "INSERT INTO seat(userid, number, PNR, date) VALUES ('". $userid ."', '" . intval($i) . "', '". $calcPNR ."', '". $doj ."')";
		$results = mysqli_query($mysqli,$query);
		if (!$results)
		{
			die ("Impossible de mettre à jour la place : <br />". mysqli_error($mysqli));
		}
		$seatNumber = $seatNumber .", ". "$i";
	}
}

header('Location: book.php?s='.urlencode('Votre siège est réservé.')); exit;

?>

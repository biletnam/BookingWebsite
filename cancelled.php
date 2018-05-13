<?php
include('db_login.php');
session_start();
$mysqli = new mysqli($db_host,$db_username,$db_password,$db_name)or die($mysqli->error);

if($mysqli->connect_errno){
  echo $mysqli->connect_errno;
  echo $mysqli->connect_error;
}
?>
<!DOCTYPE html>
<html>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Annulation de billet</title>
        <link   rel="stylesheet"
                href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
                integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
                crossorigin="anonymous">
        <link   rel="stylesheet"
                href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
                integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
                crossorigin="anonymous">
	</HEAD>

	<body>
		<br><br><br>
		<div class="container">
			<div class="row">
					<?php
						if(isset($_POST['formSubmit']))
						{
							if(isset($_POST['formSeat']))
								$aSeat = $_POST['formSeat'];

							if(empty($aSeat))
						    {
								echo("<div class='alert alert-danger'>Vous n'avez sélectionné aucun ticket.</div>\n");
							}
						    else
						    {
						        $N = count($aSeat);
								for($i=0; $i < $N; $i++)
								{
									$query = "delete from seat where PNR = '" . $aSeat[$i] . "'";
									$result = mysqli_query($mysqli,$query);
								}
								echo "<div class='alert alert-success'>Votre (vos) billet (s) est (sont) annulé (s). Vous serez automatiquement redirigé après 5 secondes.</div>";
								header("refresh: 5; index.php");
							}
						}
					?>

			</div>
		</div>
	</body>
</html>

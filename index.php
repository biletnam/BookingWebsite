<!DOCTYPE html>
<?php
	include('db_login.php');
	$mysqli = new mysqli($db_host,$db_username,$db_password,$db_name)or die($mysqli->error);

	if($mysqli->connect_errno){
		echo $mysqli->connect_errno;
		echo $mysqli->connect_error;
	}
?>
<html>
	<head>
		<meta   charset="utf-8">
		<meta   name="viewport"
                content="width=device-width, initial-scale=1.0">
		<title>Réservation de billets de bus</title>
        <link   rel="stylesheet"
                href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
                integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
                crossorigin="anonymous">
        <link   rel="stylesheet"
                href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
                integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
                crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
            <br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="row">
					<form action="seat.php" method="POST" class="mx-auto">
							<label class="text-success" style="margin-right:15px; font-size:150%;">Date du voyage</label>
                            <i class="fas fa-angle-double-right text-success"style="margin-right:15px"></i>
							<input type="date" name="doj" size="16" placeholder="YYYY-MM-DD" required>
							<i class="icon-calendar"></i>
							<br><br>
							<button type="submit" class="btn btn-primary">
								<i class="fab fa-centercode"></i> Soumettre
							</button>
							<button type="reset" class="btn btn-warning">
								<i class="fas fa-eraser"></i> Remettre
							</button>
							<a href="./login.php" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Annuler le ticket
                            </a>
					</form>
			</div>
		</div>
	</body>
</html>

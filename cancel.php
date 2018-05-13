<?php
	$db_host="localhost";
	$db_username="root";
	$db_password="";
	$db_name = "book";

$mysqli = new mysqli($db_host,$db_username,$db_password,$db_name)or die($mysqli->error);

if($mysqli->connect_errno){
  echo $mysqli->connect_errno;
  echo $mysqli->connect_error;
}


//nrecuperiw f les données mel formulaire
$userid = strip_tags( utf8_decode( $_POST['userid'] ) );
$password = strip_tags( utf8_decode( $_POST['password'] ) );


// itha ken l userid jee fera8
if (empty($userid))
    $error = 'Vous devez entrer votre identifiant d\'utilisateur.';


// itha ken l password jee fera8
if (empty($password))
    $error = 'Vous devez entrer le mot de passe.';



//besh nthabtou est ce que l'utilisateur mawjoud déja fel base de données w ella la
$select = mysqli_query($mysqli,"select * from register where userid = '" . $userid . "' and password = '" . $password . "'");
$num_rows = mysqli_num_rows($select);

if ( $num_rows == 0)
	$error = 'Vous n\'êtes pas enregistré.';


// na7na puisque kol ma tjina error n7otouha fel $error donc ken mafama 7atta error rahou al variable mahoush declaré sinon rahou fih valeur
if (isset($error)) {
    header('Location: login.php?e='.urlencode($error)); exit;
}


?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Annulation de billet</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	</head>

	<body>
		<br><br><br>

					<?php
						$query = "select * from seat where userid = '" . $userid . "'";
						$result = mysqli_query($mysqli,$query);
						if ( mysqli_num_rows($result) == 0 )
						{
                            echo "<div class=\"p-3 mb-2 bg-warning text-dark\">Vous n'avez pas réservé de billets.</div>";
						}
                    ?>
                    <div class="container">
            			<div class="row">
                    <?php
						if ( mysqli_num_rows($result) != 0 )
						{
							echo "<form action='cancelled.php' method='POST' onsubmit='return validateCheckBox();' class='mx-auto'>";
								echo "<table align='center' class='table'>";
									echo "<thead class=\"thead-dark\">";
										echo "<tr>";
											echo "<th scope=\"col\">Select</th>";
											echo "<th scope=\"col\">Seat Number</th>";
											echo "<th scope=\"col\">PNR</th>";
											echo "<th scope=\"col\">Date</th>";
										echo "</tr>";
									echo "</thead>";
									echo "<tbody>";

									while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
									{
										echo "<tr>";
											echo "<td><input type='checkbox' name='formSeat[]' value='".$row['PNR']."'/></td>";
											echo "<td>". $row['number'] ."</td>";
											echo "<td>". $row['PNR'] ."</td>";
											echo "<td>". $row['date'] ."</td>";
										echo "</tr>";
									}
									echo "<tr>";
										echo "<td>";
										echo "</td>";
										echo "<td>";
											echo '<button type="submit" name="formSubmit" class="btn btn-primary">';
												echo '<i class="fab fa-centercode"></i> Soumettre';
											echo '</button>';
										echo "</td>";
										echo "<td>";
											echo '<button type="reset" class="btn btn-warning">';
												echo '<i class="fas fa-eraser"></i> remettre';
											echo '</button>';
										echo "</td>";
										echo "<td>";
										echo "</td>";
									echo "</tr>";
									echo "</tbody>";
								echo "</table>";
							echo "</form>";
						}
					?>
			</div>
		</div>
		<script type="text/javascript">
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked)
						{
							return true;
						}
					}
				}
				alert('Veuillez sélectionner au moins 1 ticket.');
				return false;
			}
		</script>
	</body>
</HTML>

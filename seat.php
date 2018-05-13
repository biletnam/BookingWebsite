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
		<meta charset="utf-8">
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
		<br/><br/><br/>
		<div class="container">
			<div class="row">
					<form action="book.php" method="POST" onsubmit="return validateCheckBox();" class="mx-auto">
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
						<?php
							$date = strip_tags( utf8_decode( $_POST['doj'] ) );
							$query = "select * from seat where date = '" . $date . "'";
							$result = mysqli_query($mysqli,$query);
							if ( mysqli_num_rows($result) == 0 )
							{
								for($i=1; $i<11; $i++)
								{
									echo "<li class='list-group-item'";
										echo "<a href='#' title='Libre'>";
											echo "<img src='img/seat.png' alt='place libre'/>";
											echo "<label class='checkbox'> ";
												echo "<input type='checkbox' name='ch".$i."'/> Place ".$i;
											echo "</label>";
										echo "</a>";
									echo "</li>";
								}
							}
							else
							{
								$seats = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
								while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
								{
									$pnr = explode("-", $row['PNR']);
									$pnr[3] = intval($pnr[3]) - 1;
									$seats[$pnr[3]] = 1;
								}
								for($i=1; $i<11; $i++)
								{
									$j = $i - 1;
									if($seats[$j] == 1)
									{
										echo "<li class='list-group-item'>";
											echo "<a href='#' title='Réservé'>";
												echo "<img src='img/occupied.png' alt='Réservé'/>";
												echo "<label class='checkbox'> ";
													echo "<input type='checkbox' name='ch".$i."' disabled/> Place ".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
									else
									{
                                        echo "<li class='list-group-item'";
    										echo "<a href='#' title='Libre'>";
    											echo "<img src='img/seat.png' alt='place libre'/>";
    											echo "<label class='checkbox'> ";
    												echo "<input type='checkbox' name='ch".$i."'/> Place ".$i;
    											echo "</label>";
    										echo "</a>";
    									echo "</li>";
									}
								}

							}
						?>
                    </ul>
                </div>
						<center>
                            <br>
							<label>Date du voyage</label>
							<?php
								echo "<input type='text' class='span2' name='doj' value='". $date ."' readonly/>";
							?>
							<br><br>
                            <button type="submit" class="btn btn-primary">
								<i class="fab fa-centercode"></i> Soumettre
							</button>
							<button type="reset" class="btn btn-warning">
								<i class="fas fa-eraser"></i> remettre
							</button>
							<a href="./login.php" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Back
                            </a>
						</center>
					</form>

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
</html>

<!DOCTYPE html>
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
		<link   rel="stylesheet"
                href="css/style.css">
	</head>
	<body>
		<div class="container">
			<?php
			// check for a successful form post
			if (isset($_GET['e'])) echo "<div class=\"alert alert-danger\" role=\"alert\">".$_GET['e']."</div>";
			?>

			<form class="form-signin" action="cancel.php" method="POST">
				<center>
					<h2 class="form-signin-heading">Veuillez vous connecter.</h2>
                    <br>
					<input  type="text"
							class="form-control"
							name="userid"
							pattern="[A-z ]{3,}"
							title="Merci d'entrer un nom d'utilisateur valide."
							placeholder="Nom d'utilisateur" required>
					<input type="password"
						   class="form-control"
							name="password"
							placeholder="Mot de passe" required>
					<button type="submit" class="btn btn-primary">
						<i class="fas fa-sign-in-alt"></i> S'identifier
					</button>
					<button type="reset" class="btn btn-warning">
						<i class="fas fa-eraser"></i> Remettre
					</button>
				</center>
			</form>
		</div>
	</body>
</html>

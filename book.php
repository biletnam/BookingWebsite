
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Réserver les billets</title>
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
		<br>
		<div class="container">
	        <div class="page-header">
	            <h1>Réserver les billets</h1>
	        </div>
			<?php
            //message retourner aprés la réservation
					if (isset($_GET['s']))
					{
						echo "<div class=\"alert alert-success\">".$_GET['s']." Vous serez automatiquement redirigé après 5 secondes.</div>";
						header("refresh: 5; login.php");
					}
					elseif (isset($_GET['e']))
                        echo "<div class=\"alert alert-danger\">".$_GET['e']."</div>";
			?>
			<form name="contactForm" action="register.php" method="POST" class="form-horizontal">
				<div >
					<label  for='input1'>Numero de place</label>
					<div class="form-group" >
					<?php
						for($i=1; $i<11; $i++)
						{
							$chparam = "ch" . strval($i);
							if(isset($_POST[$chparam]))
							{
								echo "<input class='form-control' type='text' name=ch".$i." value=".$i." readonly/><br>";
							}
						}
					?>
	                </div>
	            </div>

					<?php
						if(isset($_POST['doj']))
						{
							echo "<div >";
							echo "<label for='input1'>Date du voyage</label>";
								echo "<div class='form-group' >";
									echo "<input type='text' class='form-control' name='journey_date' id='input1' value=". $_POST['doj'] ." readonly />";
								echo "</div>";
							echo "</div>";
						}
					?>

				<div >
	                <label class="control-label" for="input1">Nom</label>
	                <div class='form-group' >
	                    <input type="text"
                                name="user_name"
                                id="input1"
                                placeholder="Tapez votre nom"
                                class='form-control'
                                pattern="[A-z ]{3,}"
                                title="Merci d'entrer un nom valide."
                                required>
	                </div>
	            </div>

	            <div >
	                <label  for="input2">Adresse</label>
	                <div class='form-group'>
	                    <input type="text"
                               name="address"
                               id="input2"
                               placeholder="Tapez votre adresse"
                               class='form-control'
                               required>
	                </div>
	            </div>

	            <div >
	                <label  for="input3">Numéro de contact (seulement 8 chiffres)</label>
	                <div class='form-group'>
	                    <input  type="text"
                                name="mobile"
                                pattern=".{8}"
                                title="Veuillez entrer 8 chiffres."
                                class='form-control'
                                placeholder="Tapez votre numéro de portable"
                                maxlength="8"
                                required/>
	                </div>
	            </div>


	            <div >
	                <label  for="input4">Identifiant d'utilisateur</label>
	                <div class='form-group'>
	                    <input type="text"
                               class='form-control'
                               placeholder="Entrez votre identifiant utilisateur"
                               name="userid"
                               pattern="[A-z ]{3,}"
                               title="Merci d'entrer un nom d'utilisateur valide."
                               required/>
	                </div>
	            </div>


	            <div >
	                <label  for="input5">Email</label>
	                <div class='form-group'>
	                    <input  type="email"
                                class='form-control'
                                placeholder="Entrez votre identifiant email"
                                name="email"
                                title="Veuillez entrer un identifiant email valide"
                                required/>
	                </div>
	            </div>

	            <div >
	                <label  for="input6">Mot de passe</label>
	                <div class='form-group'>
	                    <input  type="password"
                                class='form-control'
                                name="password"
                                placeholder="Tapez votre mot de passe"
                                required/>
	                </div>
	            </div>

	            <div >
	                <label  for="input6">Message</label>
	                <div class='form-group'>
	                    <textarea   class='form-control'
                                    rows="3"
                                    name="message"
                                    title="S'il vous plaît entrer un message valide." >
                        </textarea>
	                </div>
	            </div>

	            <div >
	                <button type="submit" class="btn btn-primary">
						<i class="fas fa-sign-in-alt"></i> Réserver
					</button>
                    <button type="reset" class="btn btn-warning">
						<i class="fas fa-eraser"></i> Remettre
					</button>
	            </div>

			</form>
		</div>
	</body>
</html>

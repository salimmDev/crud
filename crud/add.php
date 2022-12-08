<html>
<head>	
	<title>Add</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
<?php
// connexion a la base de données
include_once("config.php");

// Ci les variables existe et n'sont pas vide 
if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
		
	// On vérifie si les champs sont vides
	 // Ci les variables existe et n'sont pas vide 
	if(empty($name) || empty($age) || empty($email)) {

		// Ci le champ nom existe et n'est pas vide 		
		if(empty($name)) {
			// affiche l'erreur
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		// Ci le champ age existe et n'est pas vide 	
		if(empty($age)) {
			// affiche l'erreur
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		// Ci le champ mail existe et n'est pas vide 	
		if(empty($email)) {
			// affiche l'erreur
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		// lien vers la page précédente
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// si tous les champs sont remplis (non vides)
			
			// On insert dans la base de donne	
			$sql = "INSERT INTO users(name, age, email) VALUES(:name, :age, :email)";
			// On prepare la requete
			$query = $dbConn->prepare($sql);
					
			// J' exécute la requête name, age et mail
			$query->bindparam(':name', $name);
			$query->bindparam(':age', $age);
			$query->bindparam(':email', $email);
			// J' exécute la requête
			$query->execute();

		
		// afficher le message en cas de réussite
		header("Location: index.php");
	}
}
?>

	<section class="container">
		<a href="index.php" type="button" class="btn btn-primary my-3">Retour</a>
		<form action="add.php" method="post" name="form1">
			<table>
				<tr class="mb-3"> 
					<td>
						<label class="form-label">Name</label>
						<input class="form-control form-control-lg" type="text" name="name">
					</td>
				</tr>
				<tr class="mb-3"> 
					<td>
						<label class="form-label">Age</label>
						<input class="form-control form-control-lg" type="number" name="age">
					</td>
				</tr>
				<tr class="mb-3"> 
					<td>
						<label class="form-label">Email</label>
					    <input class="form-control form-control-lg" type="email" name="email">
					</td>
				</tr>
				<tr class="text-center my-3"> 
					<td><input type="submit" name="Submit" value="Ajouter" class="btn btn-lg btn-primary"></input>
				</tr>
			</table>
		</form>
	</section>

	
</body>
</html>

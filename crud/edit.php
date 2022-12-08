<?php
// connexion a la base de données
include_once("config.php");

// Ci les variables existe et n'sont pas vide 
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$name=$_POST['name'];
	$age=$_POST['age'];
	$email=$_POST['email'];	
	
	// vérification des champs vides
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
	} else {	
		// On insert dans la base de donne	
		$sql = "UPDATE users SET name=:name, age=:age, email=:email WHERE id=:id";
		// On prepare la requete
		$query = $dbConn->prepare($sql);
				
		// J' exécute la requête id, name, age et mail
		$query->bindparam(':id', $id);
		$query->bindparam(':name', $name);
		$query->bindparam(':age', $age);
		$query->bindparam(':email', $email);
		// J' exécute la requête
		$query->execute();
				
		// redirection vers la page d'affichage
		header("Location: index.php");
	}
}
?>
<?php
// obtenir l'identifiant de l'url
$id = $_GET['id'];

// sélectioner les données associées par id
$sql = "SELECT * FROM users WHERE id=:id";
// On prepare la requete
$query = $dbConn->prepare($sql);
// J'éxecute la requete
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$name = $row['name'];
	$age = $row['age'];
	$email = $row['email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
	<section class="container">
		<a href="index.php" type="button" class="btn btn-primary my-3">Retour</a>
		<div class="row cols-12">
			<form name="form1" method="post" action="edit.php">
				<table>
					<tr class="mb-3"> 
						<td>
							<label class="form-label">Name</label>
							<input class="form-control form-control-lg" type="text" name="name" value="<?php echo $name;?>">
						</td>
					</tr>
					<tr class="mb-3"> 
						<td>
							<label class="form-label">Age</label>
							<input class="form-control form-control-lg" type="number" name="age" value="<?php echo $age;?>">
						</td>
					</tr>
					<tr class="mb-3"> 
						<td>
							<label class="form-label">Email</label>
							<input class="form-control form-control-lg" type="email" name="email" value="<?php echo $email;?>">
						</td>
					</tr>
					<tr class="text-center my-3"> 
						<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
						<td><input type="submit" name="update" value="Modifier" class="btn btn-lg btn-primary"></input>
					</tr>
				</table>
			</form>
		</div>
	</section>
</body>
</html>

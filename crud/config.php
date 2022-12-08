<?php
// Instanciment
$databaseHost = 'localhost';
$databaseName = 'test';
$databaseUsername = 'root';
$databasePassword = '';

try {
	// connexion a la bdd -> base de donne
	$dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);

	 // Je stocke le résultat dans un tableau associatif
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Définir l'erreur grace aux exception

} catch(PDOException $e) {
	// affiche l'erreur
	echo $e->getMessage();
}
 
?>

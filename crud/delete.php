<?php
    // connexion a la base de données
    include("config.php");

    // obtenir l'identifiant par l'id
    $id = $_GET['id'];

    // suppression de la ligne du tableau 
    $sql = "DELETE FROM users WHERE id=:id";
    $query = $dbConn->prepare($sql);
    $query->execute(array(':id' => $id));

    // redirirection vers la page d'affichage
    header("Location:index.php");
?>

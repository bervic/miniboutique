<?php
require_once 'connexion.php';

$connexion = new Connexion();
$conn = $connexion->getConnexion();

$sql_create_produit = "CREATE TABLE IF NOT EXISTS produit (
            id_produit INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            nom VARCHAR(20) NOT NULL ,
            categorie VARCHAR(20) NOT NULL ,
            desc_produit TEXT NOT NULL ,
            couleur VARCHAR(20) NOT NULL ,
            marque VARCHAR(25) NOT NULL ,
            photo VARCHAR(250) NOT NULL ,
            prix INT(3) NOT NULL ,
            quantite INT(3) NOT NULL)";

if ($conn->query($sql_create_produit) === TRUE) {
    // die( "Table produit created successfully<br>");
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

$conn->close();
?>
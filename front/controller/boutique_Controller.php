<?php
// Inclusion du modèle de la boutique
require_once('front/model/boutique_Model.php');

// Création d'une instance du modèle de la boutique
$boutique = new Boutique();

// Récupération des produits de la boutique
$produits = $boutique->getProduits();


// Inclusion de la vue de la boutique
require_once('boutique.php');
?>
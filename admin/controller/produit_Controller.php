<?php
require_once('../admin/model/produit_Model.php');

$produit = new Produit();


// Céer le produit
$creer = $produit->creerProduits();



// Récupération des produits dans la base de donnée
$produits = $produit->afficherProduits();


if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'supprimer':
            $id_produit = $_GET['id_produit'];
            $produit->supprimerProduit($id_produit);
            break;

        case 'modifier':
            $id_produit = $_GET['id_produit'];
            // header("location:modif_produit.php?");
            $produit->modifierProduit($id_produit);
            break;
        /*$suivi = $panier->valider_paiement();
        // Générer le numéro de suivi (ici, on utilise la fonction time() pour avoir un numéro unique basé sur l'heure)
        $numero_suivi = time();
        // Enregistrer la commande dans la base de données (ici, on supprime simplement le contenu du panier)
        $panier->viderPanier();
        // Afficher le message de confirmation avec le numéro de suivi
        //echo 'Merci pour votre commande. Votre numéro de suivi est le ' . $numero_suivi;
        header('Location: panier.php');
        break;*/
    }
}
?>
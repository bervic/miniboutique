<?php
include 'front/model/panier_Model.php';
// Création d'une instance du modèle de panier
$panier = new panier();
//$suivi = $panier->valider_paiement();


if (isset($_GET['id'])) {

    $id_produit = $_GET['id'];


    $panier->ajouterProduitPanier($id_produit);
    header('Location: panier.php');
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $suivi = "";
    switch ($action) {
        case 'supprimer':
            $id_produit = $_GET['id_produit'];
            $panier->supprimerProduitPanier($id_produit);
            header('Location: panier.php');
            break;

        case 'payer':
            //$suivi = $panier->valider_paiement();
            // ici, on supprime simplement le contenu du panier
            $panier->viderPanier();
            //on se dirige à la page validation_commande.php pour informer l'utilisateur que la commande a été effectué et généré le numéro de suivi
            header('Location: validation_commande.php');

            break;
    }
}

$produits_panier = $panier->getProduitsPanier();

$total_prix = 0;
foreach ($produits_panier as $produit) {
    $total_prix += $produit['prix'] * $produit['quantite'];
}

//include('panier.php');
?>
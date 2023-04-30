<?php
require_once("config/connexion.php");

class Panier
{

    // la fonction ajouterProduitPanier($id_produit) permet de d'afficher tous les produits du panier
    public function ajouterProduitPanier($id_produit)
    {
        // Vérifier si le produit existe déjà dans le panier
        if (isset($_SESSION['panier'][$id_produit])) {
            // Si le produit existe déjà, on met à jour la quantité
            $_SESSION['panier'][$id_produit]++;
        } else {
            // Sinon, on ajoute le produit dans le panier avec la quantité 1
            $_SESSION['panier'][$id_produit] = 1;
        }
    }


    // la fonction getProduitsPanier() permet d'afficher tous les produits du panier
    public function getProduitsPanier()
    {
        // Si le panier est vide, on retourne un tableau vide
        if (empty($_SESSION['panier'])) {
            return array();
        }

        // On récupère les informations des produits dans la base de données
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $ids_produits = implode(',', array_keys($_SESSION['panier']));
        $query = "SELECT * FROM produit WHERE id_produit IN ($ids_produits)";
        $result = $con->query($query);

        // On construit un tableau contenant les informations des produits
        $produits = array();
        while ($row = $result->fetch_assoc()) {
            $produit = array();
            $produit['id_produit'] = $row['id_produit'];
            $produit['nom'] = $row['nom'];
            $produit['marque'] = $row['marque'];
            $produit['photo'] = $row['photo'];
            $produit['desc_produit'] = $row['desc_produit'];
            $produit['prix'] = $row['prix'];
            $produit['quantite'] = $_SESSION['panier'][$row['id_produit']];
            $produits[] = $produit;
        }

        return $produits;
    }

    /* La fonction supprimerProduitPanier($id_produit) avec comme paramètre id du produit 
    permet de supprimer produit qui correspondant à l'id sur le panier
    */
    public function supprimerProduitPanier($id_produit)
    {
        unset($_SESSION['panier'][$id_produit]);
    }

    /* La fonction viderPanier() permet de vider le panier*/
    public function viderPanier()
    {
        unset($_SESSION['panier']);
    }


/*public function valider_paiement()
{
$suivi = '';
// Générer le numéro de suivi (ici, on utilise la fonction time() pour avoir un numéro unique basé sur l'heure)
$numero_suivi = time();
$suivi = 'Merci pour votre commande. Votre numéro de suivi est le ' . $numero_suivi;
//var_dump($suivi);
echo $suivi;
}*/
}
?>
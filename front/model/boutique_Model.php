<?php


require_once("config/connexion.php");

//session_start();
class Boutique
{


    public function getProduits()
    {
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $query = "SELECT * FROM produit";
        $result = $con->query($query);
        $produits = array();
        while ($row = $result->fetch_assoc()) {
            $produits[] = $row;
        }
        return $produits;
    }


    public function getListCategories()
    {

        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        // Requête pour récupérer toutes les marques
        $sql_Categories = "SELECT categorie FROM produit";
        $result_Categories = mysqli_query($con, $sql_Categories);
        $row = mysqli_fetch_assoc($result_Categories);
        return $row;
    }

    public function getCategories()
    {

        $connexion = new Connexion();
        $con = $connexion->getConnexion();

        // Filtrage par marque
        if (isset($_GET['categorie'])) {
            $sql = "select id_produit,categorie,detail_produit,couleur,marque,photo,prix from produit where categorie='$_GET[categorie]'";
            //$sql = "SELECT * FROM produit where categorie='$_GET[categorie]'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }
}
?>
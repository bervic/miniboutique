<?php
require_once("../config/connexion.php");

class Produit
{


    public function afficherProduits()
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

    public function creerProduits()
    {

        $photo = "";
        // Vérifier si le formulaire a été soumis
        if (isset($_POST['ajout'])) {
            $connexion = new Connexion();
            $con = $connexion->getConnexion();
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $categorie = $_POST['categorie'];
            $description = $_POST['desc_produit'];
            $couleur = $_POST['couleur'];
            $marque = $_POST['marque'];
            $prix = $_POST['prix'];
            $quantite = $_POST['quantite'];
            $photo = $_FILES['photo']['name'];
            $upload = "photos_produit/" . $photo;
            move_uploaded_file($_FILES['photo']['tmp_name'], $upload);

            //var_dump($_FILES['photo']);
            // Préparer la requête SQL pour insérer un nouveau produit
            $sql = "INSERT INTO produit (nom, categorie, desc_produit, couleur, marque, photo, prix, quantite) VALUES ('$nom', '$categorie', '$description', '$couleur', '$marque', '$photo', $prix, $quantite)";

            // Exécuter la requête SQL
            if ($con->query($sql) === TRUE) {

                echo "Le produit a été ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout du produit: " . $con->error;
            }

            // Fermer la connexion à la base de données
            $con->close();



        }
    }

    public function supprimerProduit($id_produit)
    {
        $connexion = new Connexion();
        $con = $connexion->getConnexion();

        // Préparer la requête SQL de suppression
        $sql = "DELETE FROM produit WHERE id_produit = $id_produit";

        // Exécuter la requête SQL
        if ($con->query($sql) === TRUE) {
            // Rediriger vers la page d'accueil avec un message de confirmation
            header("location: affich_produit.php?message=Produit supprimé avec succès.");
        } else {
            echo "Erreur lors de la suppression du produit: " . $con->error;
        }

        // Fermer la connexion à la base de données
        $con->close();

        // Fermer la requête
        unset($con);
    }

    public function modifierProduit($id_produit)
    {

        $modifier = "";
        // Vérifier si le formulaire a été soumis
        if (isset($_POST['modif'])) {
            $connexion = new Connexion();
            $con = $connexion->getConnexion();
            $id_produit = $_GET['id_produit'];

            if (!empty($_FILES['photo']['name'])) {
                $photo = $_FILES['photo']['name'];
                $upload = "photos_produit/" . $photo;
                move_uploaded_file($_FILES['photo']['tmp_name'], $upload);
            }
            $nom = $_POST['nom'];
            $categorie = $_POST['categorie'];
            $description = $_POST['desc_produit'];
            $couleur = $_POST['couleur'];
            $marque = $_POST['marque'];
            $prix = $_POST['prix'];
            $quantite = $_POST['quantite'];


            $req = "UPDATE produit set nom='$nom', categorie='$categorie', desc_produit='$description',
        couleur='$couleur', marque='$marque', photo='$photo',
        prix='$prix', quantite='$quantite'
        where id_produit=$_GET[id_produit]";
            // Exécuter la requête SQL
            if ($con->query($req) === TRUE) {
                echo "Le produit a été modifié avec succès.";
                //header("location:modif_produit.php?");
            } else {
                echo "Erreur lors de la modification du produit: " . $con->error;
            }
            // Fermer la connexion à la base de données
            $con->close();
        }

    }

}
?>
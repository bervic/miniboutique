<?php include 'header_admin.php';
require_once("../admin/controller/produit_Controller.php");

//--- SUPPRESSION PRODUIT ---//
if (isset($_GET['action']) && $_GET['action'] == "suppression") {
    $req = "DELETE FROM produit WHERE id_produit=$_GET[id_produit]";
    $res = $conn->query($req);
    if ($res) {
        $error_msg = "l'article a été supprimé ";
        $_GET['action'] = 'affichage';
    }
}
?>
<main>
    <h1>Liste des produits</h1>
    <?php if (isset($error_msg)) { ?>
        <p style="color: red;">
            <?php echo $error_msg; ?>
        </p>
    <?php } ?>
    <table>
        <tr>
            <th>Nom</th>
            <th>Catégorie</th>
            <th>Description</th>
            <th>Couleur</th>
            <th>Marque</th>
            <th>Photo</th>
            <th>Prix</th>
            <th>Quantité en stock</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($produits != null) {
            foreach ($produits as $produit) {
                ?>
                <tr>;
                    <td>
                        <?php echo $produit['nom'] ?>
                    </td>
                    <td>
                        <?php echo $produit['categorie'] ?>
                    </td>
                    <td>
                        <?php echo $produit['desc_produit'] ?>
                    </td>
                    <td>
                        <?php echo $produit['couleur'] ?>
                    </td>
                    <td>
                        <?php echo $produit['marque'] ?>
                    </td>
                    <td><img src='photos_produit/<?php echo $produit['photo'] ?>' alt='nom' width='100'></td>
                    <td>
                        <?php echo $produit['prix'] ?> CAD
                    </td>
                    <td>
                        <?php echo $produit['quantite'] ?>
                    </td>
                    <td>
                        <a href='modif_produit.php?action=modifier&id_produit=<?php echo $produit['id_produit'] ?>'><img
                                src="img/edit.png" alt='Edit' width='20'></a>
                        <a href='affich_produit.php?action=supprimer&id_produit=<?php echo $produit['id_produit'] ?>'><img
                                src="img/delete.png" alt='Edit' width='20'></a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>


    </table>
</main>
<?php include 'footer_admin.php'; ?>
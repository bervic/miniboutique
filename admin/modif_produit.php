<?php include 'header_admin.php';


// Inclure le fichier de connexion à la base de données
require_once("../config/connexion.php");
require_once("../admin/controller/produit_Controller.php");


// Vérifier si le formulaire a été soumis
$connexion = new Connexion();
$con = $connexion->getConnexion();
$id_produit = $_GET['id_produit'];
$sql = "SELECT * FROM produit WHERE id_produit = '$id_produit'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

$nom = $row['nom'];
$photo = $row['photo'];
$categorie = $row['categorie'];
$marque = $row['marque'];
$prix = $row['prix'];
$quantite = $row['quantite'];
$desc_produit = $row['desc_produit'];

?>

<main>
    <h1>Modifier le produit</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nom">Nom du produit *</label>
        <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>" required>

        <label for="categorie">Catégorie *</label>
        <select name="categorie" id="categorie" value="<?php echo $categorie; ?>" required>
            <option value="">Choisissez une catégorie</option>
            <option value="vetements">Vêtements</option>
            <option value="chaussures">Chaussures</option>
            <option value="accessoires">Accessoires</option>
        </select>

        <label for="desc">Description *</label>
        <textarea name="desc_produit" id="desc" required> <?php echo $desc_produit; ?></textarea>

        <label for="couleur">Couleur *</label>
        <select name="couleur" id="couleur" required>
            <option value="">Choisissez une couleur</option>
            <option value="noir">Noir</option>
            <option value="blanc">Blanc</option>
            <option value="rouge">Rouge</option>
            <option value="bleu">Bleu</option>
        </select>

        <label for="marque">Marque *</label>
        <input type="text" name="marque" id="marque" value="<?php echo $marque; ?>" required>

        <label for="photo">Photo *</label>
        <input type="file" name="photo" id="photo" value="<?php echo $photo; ?>" required>
        <!-- <p><em>(Taille maximale: 2MB. Formats acceptés: jpg, jpeg, png)</em></p>-->

        <label for="prix">Prix *</label>
        <input type="number" name="prix" id="prix" min="1" value="<?php echo $prix; ?>" required>

        <label for="stock">Quantité en stock *</label>
        <input type="number" name="quantite" id="stock" min="0" value="<?php echo $quantite; ?>" required>

        <input type="submit" name="modif" value="Modifier le produit">
    </form>
</main>
<?php include 'footer_admin.php'; ?>
<?php
session_start();
include 'header.php';
require_once('front/controller/panier_Controller.php');


?>

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                <h1 class="mb-0 bread">My Wishlist</h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">

                <div class="cart-list">

                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;

                            if (empty($produits_panier)) // panier vide
                            {
                                echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
                                echo "<tr><td colspan='5'><a href='boutique.php'>continuer vos achats</a></td></tr>";
                            } else {
                                //On parcourt tous les produits ajoutés au panier pour les afficher
                                foreach ($produits_panier as $produit):
                                    ?>
                                    <tr class="text-center">
                                        <td class="product-remove"><a
                                                href="panier.php?action=supprimer&id_produit=<?php echo $produit['id_produit']; ?>"><span
                                                    class="ion-ios-close"></span></a></td>

                                        <td class="image-prod">
                                            <div class="img"
                                                style="background-image:url(admin/photos_produit/<?php echo $produit['photo']; ?>);">
                                            </div>
                                        </td>

                                        <td class="product-name">
                                            <h3>
                                                <?php echo $produit['nom'];
                                                ?>
                                            </h3>
                                            <p>
                                                <?php echo $produit['desc_produit']

                                                ; ?>
                                            </p>
                                        </td>

                                        <td class="price">
                                            <?php echo $produit['prix']; ?>
                                        </td>

                                        <td class="quantity">
                                            <?php echo $produit['quantite']; ?>

                                        </td>

                                        <td class="total">
                                            <?php echo $produit['prix'] * $produit['quantite']; ?>
                                        </td>
                                        <?php

                                endforeach;
                                ?>
                                </tr>
                            <?php } ?>
                            <!-- END TR-->
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <?php
        if (empty($produits_panier)) // panier vide
        {
        } else {
            ?>
            <div class="row justify-content-start">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>
                                <?php echo $total_prix; ?>
                            </span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>
                                <?php echo $total_prix - 3; ?>
                            </span>
                        </p>
                    </div>
                    <p class="text-center"><a href="panier.php?action=payer"" class=" btn btn-primary py-3 px-4">Payer</a>
                    </p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<?php
//}
?>

<?php
include 'footer.php';
?>
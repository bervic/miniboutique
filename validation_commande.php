<?php
session_start();
include 'header.php';

// Générer le numéro de suivi (ici, on utilise la fonction time() pour avoir un numéro unique basé sur l'heure)
$numero_suivi = time();

$suivi = 'Merci pour votre commande. Votre numéro de suivi est le ' . $numero_suivi;
//var_dump($suivi);


?>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <?php
                    echo $suivi; ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
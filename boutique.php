<?php
session_start();
include 'header.php';

require_once('front/controller/boutique_Controller.php');
//include '../front/controller/boutique_Controller.php';

?>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
				<h1 class="mb-0 bread">Shop</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-10 order-md-last">
				<div class="row">
					<!-- début pour Lister des produits -->
					<?php
					if ($produits != null) //Vérifie si les produits ne sont pas vides
					{
						foreach ($produits as $produit) {
							?>
							<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
								<div class="product d-flex flex-column">
									<a href="#" class="img-prod"><img class="img-fluid"
											src="admin/photos_produit/<?php echo $produit['photo']; ?>" alt="photo">
										<div class="overlay"></div>
									</a>
									<div class="text py-3 pb-4 px-3">
										<div class="d-flex">
											<div class="cat">
												<span>
													<?php echo $produit['marque']; ?>
												</span>
											</div>
											<div class="rating">
												<p class="text-right mb-0">
													<a href="#"><span class="ion-ios-star-outline"></span></a>
													<a href="#"><span class="ion-ios-star-outline"></span></a>
													<a href="#"><span class="ion-ios-star-outline"></span></a>
													<a href="#"><span class="ion-ios-star-outline"></span></a>
													<a href="#"><span class="ion-ios-star-outline"></span></a>
												</p>
											</div>
										</div>
										<h3><a href="#">
												<?php echo $produit['nom']; ?>
											</a></h3>
										<div class="pricing">
											<p class="price"><span>
													<?php echo $produit['prix']; ?> CAD
												</span></p>
										</div>
										<p class="bottom-area d-flex px-3">
											<a href="panier.php?action=ajout&id=<?php echo $produit['id_produit']; ?>"
												class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
														class="ion-ios-add ml-1"></i></span></a>
											<a href="#" class="buy-now text-center py-2">Buy now<span><i
														class="ion-ios-cart ml-1"></i></span></a>
										</p>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>
					<!-- fin pour Lister des produits -->
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-gallery">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 heading-section text-center mb-4 ftco-animate">
				<h2 class="mb-4">Follow Us On Instagram</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
					live the blind texts. Separated they live in</p>
			</div>
		</div>
	</div>
	<div class="container-fluid px-0">
		<div class="row no-gutters">
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/gallery-1.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-instagram"></span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/gallery-2.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-instagram"></span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/gallery-3.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-instagram"></span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/gallery-4.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-instagram"></span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/gallery-5.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-instagram"></span>
					</div>
				</a>
			</div>
			<div class="col-md-4 col-lg-2 ftco-animate">
				<a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center"
					style="background-image: url(images/gallery-6.jpg);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-instagram"></span>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

<?php
include 'footer.php';
?>
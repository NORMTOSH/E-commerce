<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>



<!--change color of the nav bar with different skins-->
<body class="hold-transition skin-black-light layout-top-nav">

	<!-- Navbar -->

	<div class = "section">
		<?php include 'includes/navbar.php'; ?>
	</div>

	<!-- /Navbar -->

	<!-- slider SECTION -->
	<section id = "slider">
		<div class="row">
			<div class="col-sm-12">
				<div class="cont">
					<div class="sliders"></div>
					<ul class="navs"></div>
					<div data-target='right' class="side-nav side-nav--right"></div>
					<div data-target='left' class="side-nav side-nav--left"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- /slider SECTION -->

	<!-- shipping box SECTION -->
	<section id="shiping">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="shipping-box">
                        <div class="box-icon"><div class="service-icon"><ion-icon name="extension-puzzle-outline"></ion-icon></div></div>
                        <div class="box-title">
                            <h3>UNCUT</h3>
                            <p>-Irregular shapes & sizing-</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="shipping-box">
						<div class="box-icon"><div class="service-icon"><ion-icon name="copy-outline"></ion-icon></div></div>
                        <div class="box-title">
                            <h3>CUT</h3>
                            <p>-Linear edges & variant sizing-</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="shipping-box">
						<div class="box-icon"><div class="service-icon"><ion-icon name="file-tray-stacked-outline"></ion-icon></div></div>
                        <div class="box-title">
                            <h3>SLAB</h3>
                            <p>-Uniform slicing & shaping-
							</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="shipping-box">
						<div class="box-icon"><div class="service-icon"><ion-icon name="qr-code-outline"></ion-icon></div></div>
                        <div class="box-title">
                            <h3>CHIPPINGS</h3>
                            <p>-Broken pieces & unique patterns-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!--/ shipping box SECTION -->

	<div class="wrapper">
		<div class="content-wrapper">
			<div class="container">

			<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-12">
							<?php
								if(isset($_SESSION['error'])){
									echo "
										<div class='alert alert-danger'>
											".$_SESSION['error']."
										</div>
									";
									unset($_SESSION['error']);
								}
								
							?>
							
							<!-- partial -->
							<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="dist/js/script.js"></script>
						</div>

						<div class="col-sm-9">
							<h2> </h2><br>
							<h2>TOP SELLERS</h2>
							<?php
								$month = date('m');
								$conn = $pdo->open();

								try{
									$inc = 3;	
									$stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
									$stmt->execute();
									foreach ($stmt as $row) {
										$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
										$inc = ($inc == 3) ? 1 : $inc + 1;
										if($inc == 1) echo "<div class='row'>";
										echo "
											<div class='col-sm-4'>
												<div class='box box-solid' style='border-bottom: 1px solid #ceb990; border-radius: 10px;'>
													<div class='box-body prod-body'>
														<img src='".$image."' width='100%' height='230px' class='thumbnail' style='border-radius: 10px;'>
														<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
													</div>
													<div class='box-footer'>
														<b>&#36; ".number_format($row['price'], 2)."</b>
													</div>
												</div>
											</div>
										";
										if($inc == 3) echo "</div>";
									}
									if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
									if($inc == 2) echo "<div class='col-sm-4'></div></div>";
								}
								catch(PDOException $e){
									echo "There is some problem in connection: " . $e->getMessage();
								}

								$pdo->close();
							?>
						</div>
						
						<!--sidebar -->
						<div class="col-sm-3">
							<?php include 'includes/sidebar.php'; ?>
						</div>
						<!--/sidebar -->
					</div>

					<!--- BANNER -->
					<div class="banner">

						<div class="container">

							<div class="slider-container has-scrollbar">

								<div class="slider-item">

									<img src="https://i.postimg.cc/ZqYt1hZ7/32885282-7709032.jpg" alt="Latest sale" class="banner-img">

									<div class="banner-content" style='border: 1px solid #ceb990; border-radius: 10px;'>

										<p class="banner-subtitle">Trending item</p>

										<h2 class="banner-title">Mazera's latest designs</h2>

										<a href="#" class="banner-btn">View Projects</a>

									</div>

								</div>

							</div>

						</div>

					</div>

				</section>
			
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="content-wrapper">
			<div class="container">

			<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-12">
							<?php
								if(isset($_SESSION['error'])){
									echo "
										<div class='alert alert-danger'>
											".$_SESSION['error']."
										</div>
									";
									unset($_SESSION['error']);
								}
								
							?>
							
							<!-- partial -->
							<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="dist/js/script.js"></script>
						</div>

						<div class="col-sm-12">
							<h2> </h2><br>
							<h2>NEW COLLECTION</h2>
							<?php
								$conn = $pdo->open();

								try {
									$stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 6");
									$stmt->execute();
									
									foreach ($stmt as $row) {
										$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
										
										echo "
											<div class='col-sm-4'>
												<div class='box box-solid' style='border-bottom: 1px solid #ceb990; border-radius: 10px;'>
													<div class='box-body prod-body'>
														<img src='".$image."' width='100%' height='230px' class='thumbnail' style='border-radius: 10px;'>
														<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
													</div>
													<div class='box-footer'>
														<b>&#36; ".number_format($row['price'], 2)."</b>
													</div>
												</div>
											</div>
										";
									}
								} catch(PDOException $e) {
									echo "There is some problem in connection: " . $e->getMessage();
								}
							
								$pdo->close();
							?>
						</div>
					</div>
				</section>
			
			</div>
		</div>
	</div>

	<!-- Products tab & slick -->
	<div class="col-md-12 mainn mainn-raised" style="background:white; border-top: 1px solid #ceb990; padding-top: 30px;">
	<h2 class="title"> FEATURED PRODUCTS</h2>
		<div class="row">
			<div class="products-tabs">
				<!-- tab -->
				<div id="tab2" class="tab-pane fade in active">
					<div class="products-slick" data-nav="#slick-nav-2">
						<!-- product -->
						<?php
						include 'includes/db.php';
											
						$product_query = "SELECT products.*, category.name AS cat_name FROM products JOIN category ON products.category_id = category.id ORDER BY products.id DESC LIMIT 10";
						$run_query = mysqli_query($con, $product_query);

						if (!$run_query) {
							die("Query failed: " . mysqli_error($con));
						}

						if(mysqli_num_rows($run_query) > 0){
							while($row = mysqli_fetch_array($run_query)){
								// code to display each product
								$pro_id = $row['id'];
								$category_id = $row['category_id'];
								$category_name = $row['cat_name'];
								$name = $row['name'];
								$price = $row['price'];
								$photo = $row['photo'];
								
								echo "
								<form>
									<div class='product'>
										<a href='product.php?product=$pro_id'><div class='product-img'>
											<img src='images/$photo' style='height: 400px; border-radius: 10px; padding: 10px;' alt=''>
											<div class='product-label'>
												<span class='sale'>-30%</span>
												<span class='new'>NEW</span>
											</div>
										</div></a>
										<div class='product-body'>
											<p class='product-category'>$category_name</p>
											<h3 class='product-name header-cart-item-name'><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h3>
											<h4 class='product-price header-cart-item-info'>$price<del class='product-old-price'> ksh990.00</del></h4>
											<div class='product-rating'>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
											</div>
										</div>
										<div class='add-to-cart'>
											<button type='submit' pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
										</div>
									</div>
								</form>
						";
							}
						} else {
							echo "No products found.";
						}

						?>
						<!-- /product -->

					</div>
					<div id="slick-nav-2" class="products-slick-nav"></div>
				</div>
				<!-- /tab -->
			</div>
		</div>
	</div>
	<!-- /Products tab & slick -->

	<!--HTML5 Video Plyr.io -->
	<section class="container">
		<div class="video-wrapper">
			<iframe allow="fullscreen" allowfullscreen src="https://streamable.com/e/6tdecj?nocontrols=1"></iframe>
		</div>
	</section>
	<!--/HTML5 Video Plyr.io -->

	<!--- TESTIMONIALS, CTA & SERVICE-->
    <div class="col-md-12">

    <div class="container">
        <div class="testimonials-box">

          	<!--- TESTIMONIALS -->
			<div class="col-md-4">
				<div class="testimonial text-center">

					<h2 class="title">Reach Out</h2>

					<div class="testimonial-card">

					<img src="https://i.postimg.cc/tJwfjn3q/Whats-App-Image2023-07-12at12-47-49-PM.jpg" alt="alan doe" class="testimonial-banner" width="80" height="80">

					<p class="testimonial-name">TONY MAINA</p>

					<p class="testimonial-title">PRODUCT MANAGER</p>

					<img src="https://i.postimg.cc/SR0vVVtH/BV.png" alt="quotation" class="quotation-img" width="26">

					<p class="testimonial-desc">
					<a href="#"><i class="fa fa-phone"></i> +254-712015672</a>
					</p>

					</div>

				</div>
			</div>

          <!--- CTA -->
			<div class="col-md-4">
				<div class="cta-container">

					<img src="https://i.postimg.cc/8PVhCQDp/19964711-6203940.jpg" alt="summer collection" class="cta-banner">

					<a href="#" class="cta-content">

					<p class="discount">Get a Discount</p>

					<h2 class="cta-title">Summer collection</h2>

					</a>

				</div>
			</div>

          <!--- SERVICE --->

			<div class="service text-center">
				<h2 class="title">Our Services</h2>

				<div class="service-container">

				<a href="#" class="service-item">

					<div class="service-icon">
					<ion-icon name="boat-outline"></ion-icon>
					</div>

					<div class="service-content">

					<h3 class="service-title">Worldwide Delivery</h3>
					<p class="service-desc">For Order Over $100</p>

					</div>

				</a>

				<a href="#" class="service-item">
				
					<div class="service-icon">
					<ion-icon name="rocket-outline"></ion-icon>
					</div>
				
					<div class="service-content">
				
					<h3 class="service-title">Next Day delivery</h3>
					<p class="service-desc">UK Orders Only</p>
				
					</div>
				
				</a>

				<a href="#" class="service-item">
				
					<div class="service-icon">
					<ion-icon name="call-outline"></ion-icon>
					</div>
				
					<div class="service-content">
				
					<h3 class="service-title">Best Online Support</h3>
					<p class="service-desc">Hours: 8AM - 11PM</p>
				
					</div>
				
				</a>

				<a href="#" class="service-item">
				
					<div class="service-icon">
					<ion-icon name="arrow-undo-outline"></ion-icon>
					</div>
				
					<div class="service-content">
				
					<h3 class="service-title">Return Policy</h3>
					<p class="service-desc">Easy & Free Return</p>
				
					</div>
				
				</a>

				<a href="#" class="service-item">
				
					<div class="service-icon">
					<ion-icon name="ticket-outline"></ion-icon>
					</div>
				
					<div class="service-content">
				
					<h3 class="service-title">30% money back</h3>
					<p class="service-desc">For Order Over $100</p>
				
					</div>
				
				</a>

				</div>

			</div>

        </div>

    </div>

	<!-- footer SECTION -->
	<div class = "section">
		<?php 
		include 'includes/footer.php';
		?>
	</div>
	<!-- /footer SECTION -->
	<?php 
	include 'includes/scripts.php';
	?>
</body>
</html>
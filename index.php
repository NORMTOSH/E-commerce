<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>



<!--change color of the nav bar with different skins-->
<body class="hold-transition skin-yellow-light layout-top-nav">
	<!-- Navbar -->
	<div class = "section">
		<?php include 'includes/navbar.php'; ?>
	</div>
	<!-- /Navbar -->

	<!-- slider SECTION -->
	
	<div class="row">

		<!-- slider -->
		<div class="col-sm-12">
			<div class="cont">
				<div class="sliders"></div>
				<ul class="navs"></div>
				<div data-target='right' class="side-nav side-nav--right"></div>
				<div data-target='left' class="side-nav side-nav--left"></div>
			</div>
		</div>
		<!--/slider -->

	</div>
	
	<!-- /slider SECTION -->

	<div class="wrapper">
		<div class="content-wrapper">
			<div class="container">

			<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-12"> <!-- full width 12 -->
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
							<h2>Top Sellers</h2>
							<?php
								$month = date('m');
								$conn = $pdo->open();

								try{
									$inc = 3;	
									$stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 3");
									$stmt->execute();
									foreach ($stmt as $row) {
										$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
										$inc = ($inc == 3) ? 1 : $inc + 1;
										if($inc == 1) echo "<div class='row'>";
										echo "
											<div class='col-sm-4'>
												<div class='box box-solid'>
													<div class='box-body prod-body'>
														<img src='".$image."' width='100%' height='230px' class='thumbnail'>
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

						<!-- section title -->
						<div class="col-md-9">
							<div class="section-title">
								<h3 class="title">NEW PRODUCTS</h3>
							</div>
						</div>
						<!-- /section title -->

						<!-- Products tab & slick -->
						<div class="col-md-12 mainn mainn-raised">
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
													<div class='product'>
														<a href='product.php?product=$pro_id'><div class='product-img'>
															<img src='images/$photo' style='max-height: 170px;' alt=''>
															<div class='product-label'>
																<span class='sale'>-30%</span>
																<span class='new'>NEW</span>
															</div>
														</div></a>
														<div class='product-body'>
															<p class='product-category'>$category_name</p>
															<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$name</a></h3>
															<h4 class='product-price header-cart-item-info'>$price<del class='product-old-price'>$990.00</del></h4>
															<div class='product-rating'>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
															</div>
															<div class='product-btns'>
																<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
																<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
																<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
															</div>
														</div>
														<div class='add-to-cart'>
															<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
														</div>
													</div>
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
			
						<!-- section title -->
						<div class="col-md-9">
							<div class="section-title">
								<h3 class="title">NEW PRODUCTS</h3>
							</div>
						</div>
						<!-- /section title -->

						<!-- Products tab & slick -->
						<div class="col-md-12 mainn mainn-raised">
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
													<div class='product'>
														<a href='product.php?product=$pro_id'><div class='product-img'>
															<img src='images/$photo' style='max-height: 170px;' alt=''>
															<div class='product-label'>
																<span class='sale'>-30%</span>
																<span class='new'>NEW</span>
															</div>
														</div></a>
														<div class='product-body'>
															<p class='product-category'>$category_name</p>
															<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$name</a></h3>
															<h4 class='product-price header-cart-item-info'>$price<del class='product-old-price'>$990.00</del></h4>
															<div class='product-rating'>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
																<i class='fa fa-star'></i>
															</div>
															<div class='product-btns'>
																<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
																<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
																<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
															</div>
														</div>
														<div class='add-to-cart'>
															<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
														</div>
													</div>
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

					</div>
				</section>
			
			</div>
		</div>
	</div>

	<!-- slider SECTION -->
	<div>			
		<div class="col-sm-12">
			<?php 
			include "newslettter.php";
			include 'includes/footer.php';
			?>
		</div>
	</div>
	<!-- /slider SECTION -->
	<?php 
	include 'includes/scripts.php';
	?>
</body>
</html>
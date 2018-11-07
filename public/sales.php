<?php
require_once ('../private/initialize.php');
$page_title="sales";
include_once (SHARED_PATH .'/public_header.php');

if(is_post_request()){
$sale =[];
 	$sale['name'] = $_POST['name'] ?? '';
	$sale['number'] = $_POST['phone'] ?? '';
	$sale['email'] = $_POST['email'] ?? '';
	$sale['message'] = $_POST['message'] ?? '';


 	$result=insert_sales($sale);
 	
 }


?>

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								QS				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="services.php"> Quick sales</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->


			<!-- Start discount-section Area -->
			<section class="discount-section-area relative section-gap">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row align-items-center justify-content-between no-gutters">
						<div class="col-lg-6 discount-left">
							<h1 class="text-white">Enjoy 25% Seasonal Discount!</h1>
							<p class="text-white">
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial.
							</p>
							<a href="#" class="header-btn">Order Service Now</a>
						</div>
						<div class="col-lg-5 discount-right">
							<h4 class="text-white">Get a free Estimate</h4>
		                    <form  method="POST" action="sales.php" enctype="multipart/form-data">
		                        <div class="row">
		                            <div class="col-lg-12 d-flex flex-column">
		                                <input name="name" type="text" placeholder="Your name"  class="form-control mt-20" required="yes" >
		                            </div>
		                            <div class="col-lg-12 d-flex flex-column">
		                                <input name="phone" type="number" placeholder="enter your email"  class="form-control mt-20" required="yes" >
		                            </div>
		                            <div class="col-lg-12 d-flex flex-column">
		                                <input name="email" type="text" placeholder="enter your subject"  class="form-control mt-20" required="yes" >
		                            </div>
		                            
		                            <div class="col-lg-12 flex-column">
		                                <textarea rows="5" class="form-control mt-20" name="message" placeholder="message" required="yes"></textarea>
		                            </div>

		                            <div class="col-lg-12 d-flex justify-content-end send-btn">
		                                <button class="genric-btn primary mt-20 text-uppercase "  type="submit" >Submit</button>
		                            </div>
		                        </div>
		                    </form>
						</div>
					</div>
				</div>	
			</section>
			<!-- End discount-section Area -->
			
			
			<section class="qs-area section-gap" id="qs">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-7">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Quick sales</h1>
								<p class="text-white">sales on <b>L</b>uss<b>H</b>ub is always like a seasional sale.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-qs-carusel">
							<div class="single-qs item">
								<img class="mx-auto" src="img/luss1.jpg" alt="">
								<h5>Mark Alviro Wiens</h5>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-qs item">
								<img class="mx-auto" src="img/luss2.jpg" alt="">
								<h5>Mark Alviro Wiens</h5>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-qs item">
								<img class="mx-auto" src="img/luss3.jpg" alt="">
								<h5>Mark Alviro Wiens</h5>
								<p>
									CEO at Google
								</p>
							</div>															
							<div class="single-qs item">
								<img class="mx-auto" src="img/luss4.jpg" alt="">
								<h5>Mark Alviro Wiens</h5>
								<p>
									CEO at Google
								</p>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End qs Area -->		

			<!-- start footer Area -->		
			<?php include_once(SHARED_PATH . '/public_footer.php');	
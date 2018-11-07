<?php 
require_once ('../private/initialize.php');
$page_title = "contact";
include_once (SHARED_PATH .'/public_header.php');
 if(is_post_request()){
$contact = [];
 	$contact['name'] = $_POST['name'] ?? '';
	$contact['email'] = $_POST['email'] ?? '';
	$contact['subject'] = $_POST['subject'] ?? '';
	$contact['message'] = $_POST['message'] ?? '';


 	$result=insert_contact($contact);
 	
 }

?>
<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.php"> Contact Us</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->
			
			
			<!-- Start service Area -->
			<section class="service-area section-gap pspcover" id="service">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-12 pb-50 header-text text-center">
							<h1 class="mb-10">PSPs cover</h1>
							<p>
								all of our PSPs enjoy on hand quality service from us.
							</p>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-service">
								<div class="thumb">
									<img src="img/o1.jpg" alt="">									
								</div>
								<h4>Repairs</h4>
								<p>
									With us you dont need to worry when your system damages or when natural desaster happens. <a href="Click for more">more</a>
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-service">
								<div class="thumb">
									<img src="img/o2.jpg" alt="">									
								</div>
								<h4>Maintainace</h4>
								<p>
									We keep your systems upto date with the leading technologies<a href="Click for more">more</a>
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-service">
								<div class="thumb">
									<img src="img/o3.jpg" alt="">									
								</div>
								<h4>Development</h4>
								<p>
									We help you build up the most reliable system network. <a href="click for more">more</a>
								</p>
							</div>
						</div>	
						<div class="col-lg-3 col-md-6">
							<div class="single-service">
								<div class="thumb">
									<img src="img/o4.jpg" alt="">									
								</div>
								<h4>Consultance</h4>
								<p>
									Get a first class insight with our IT experts. <a href="Click for more">more</a>
								</p>
							</div>
						</div>																		
					</div>
				</div>	
			</section>
			<!-- End service Area -->
			
			
			<!-- Start work-process Area -->
			<section class="work-process-area pt-120 ">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-7">
							<div class="title text-center">
								<h1 class="mb-10">How it Works</h1>
								<p>You're one step to jpoining the biggest chain of PSPs centralized system.</p>
							</div>
						</div>
					</div>	
					<div class="total-work-process d-flex flex-wrap justify-content-around align-items-center">
						<div class="single-work-process">
							<div class="work-icon-box">
								<span class="lnr lnr-train"></span>
							</div>
							<p class="caption">Signup</p>
						</div>
						<div class="work-arrow">
							<img src="img/arrow.png" alt="">
						</div>
						<div class="single-work-process">
							<div class="work-icon-box">
								<span class="lnr lnr-layers"></span>
							</div>
							<p class="caption">Join a division</p>
						</div>
						<div class="work-arrow">
							<img src="img/arrow.png" alt="">
						</div>
						<div class="single-work-process">
							<div class="work-icon-box">
								<span class="lnr lnr-database"></span>
							</div>
							<p class="caption">Update PS board</p>
						</div>
						<div class="work-arrow">
							<img src="img/arrow.png" alt="">
						</div>
						<div class="single-work-process">
							<div class="work-icon-box">
								<span class="lnr lnr-smile"></span>
							</div>
							<p class="caption">You're connected</p>
						</div>											
					<div class="row">
						<div class="col"></div>
					</div>
				</div>	
			</section>
			<!-- End work-process Area -->

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Binghamton, New York</h5>
									<p>
										4343 Hinkle Deegan Lake Road
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>00 (958) 9865 562</h5>
									<p>Mon to Fri 9am to 6 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>support@colorlib.com</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form  method="POST" action="contact.php" enctype="multipart/form-data">
		                        <div class="row">
		                            <div class="col-lg-12 d-flex flex-column">
		                                <input name="name" type="text" placeholder="Your name"  class="form-control mt-20" required="yes" >
		                            </div>
		                            <div class="col-lg-12 d-flex flex-column">
		                                <input name="email" type="text" placeholder="enter your email"  class="form-control mt-20" required="yes" >
		                            </div>
		                            <div class="col-lg-12 d-flex flex-column">
		                                <input name="subject" type="text" placeholder="enter your subject"  class="form-control mt-20" required="yes" >
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
			<!-- End contact-page Area -->

		<?php include_once(SHARED_PATH . '/public_footer.php');	
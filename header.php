<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>DM-Fitness</title>
<!--

TemplateMo 548 Training Studio

https://templatemo.com/tm-548-training-studio

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-training-studio.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">DM<em> Fitness</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" >Home</a></li>
                            <li class="scroll-to-section"><a href="about.php">About</a></li>
                            <li class="scroll-to-section"><a href="view_membership.php">Membership</a></li>
                            <li class="scroll-to-section"><a href="product.php">Products</a></li>
							
                            
						<?php
						if(isset($_SESSION['custid']))
						{
							?>
							<li class="scroll-to-section"><a href="cust_complain.php">Complain</a></li>
							 <li><a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a class="hvr-bounce-to-bottom" href="cust_view_booking_package_detail.php">View Package Booking Detail</a></li>
									<li><a class="hvr-bounce-to-bottom" href="cust_view_all_order_detail.php">View All Orders</a></li>
									<li><a class="hvr-bounce-to-bottom" href="cust_view_complain_status.php">View Complain</a></li>           
								</ul>
							</li>
							<li class="scroll-to-section"><a href="logout.php">LOGOUT</a></li>
							<?php
						}else{
						?>
						
                            <li class="scroll-to-section"><a href="login.php">LOGIN</a></li>
							<li class="scroll-to-section"><a href="contact.php">Contact</a></li> 
						<?php
						}
						?>
						<li class="scroll-to-section"><a href="view_cart.php">CART</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
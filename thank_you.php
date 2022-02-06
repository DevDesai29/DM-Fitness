<?php
session_start();
include("header.php");
include("connect.php");
$cartid=$_SESSION['cartid'];
unset($_SESSION['cartid']);
$oid=$_REQUEST['oid'];
$oamt=$_REQUEST['oamt'];

$res1=mysql_query("select * from order_detail where order_id='$oid'");
$r1=mysql_fetch_array($res1);
$cartid=$r1[2];
$ptype=$r1[7];
?>
   

   
 <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Thank You <em> For Your Valuable Order</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-6">
                 <?php
				
				$tot=0;
				$qur=mysql_query("select * from cart_detail where cart_id='$cartid'");
				if(mysql_num_rows($qur)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>PRODUCT IMAGE</th>
								<th>PRODUCT NAME</th>
								<th>QUANTITY</th>
								<th>PRICE</th>
								<th>AMOUNT</th>
								
							</tr>";
					while($q=mysql_fetch_array($qur))
					{
						echo "<tr>";
						$qur2=mysql_query("select * from gym_products where product_id='$q[2]'");
						$q2=mysql_fetch_array($qur2);
						echo "<td><img src='$q2[4]' style='width:150px; height:150px;'></td>";
						echo "<td>$q2[1]</td>";
						echo "<td>$q[3]</td>";
						echo "<td>&#8377; $q[4] /-</td>";
						
						$amt=$q[3]*$q[4];
						$tot=$tot+$amt;
						echo "<td>&#8377; $amt /-</td>";
						
						echo "</tr>";
					}
					echo "</table><br/><br/>";
					echo "<h3>Total Amount: &#8377; $tot /-</h3>";
					
				}else{
					echo "<h2>No Product Found Into Cart</h2>";
				}
				?>
              </div>
              <div class="col-lg-6">
                <section class='tabs-content'>
                  <div class="contact-form">
                        <form id="contact" action="" method="post">
                          <div class="row">
                            
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <h2>Your Order Id is : <?php echo $oid; ?> </h2>
								<br/><br/>
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <h2>Your Order Amount is : &#8377; <?php echo $oamt; ?> /- </h2>
								<br/><br/>
                              </fieldset>
                            </div>
                            
                            <div class="col-lg-12">
                              <fieldset>
								<h2>Payment Type: <?php echo $ptype; ?></h2>
								<br/><br/>
                              </fieldset>
                            </div>
							
							<div class="col-lg-12">
                              <fieldset>
								<h2>Your Order Delivered in 3 to 4 Working Days.</h2>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                  
                  
                </section>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->
    
    <!-- ***** Call to Action Start ***** -->
    <section class="section" id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Don’t <em>think</em>, begin <em>today</em>!</h2>
                        <p>If you want to be a hit in life, you gotta be fit and fine.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

   
  

<?php
include("footer.php");
?>
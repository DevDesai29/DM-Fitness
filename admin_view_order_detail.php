<?php
session_start();
include("admin_header.php");
include("connect.php");


?>
   
 <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>ORDER<em> DETAIL</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-12">
                <?php
				$cartid=$_REQUEST['cartid'];
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
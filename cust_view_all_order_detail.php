<?php
session_start();
include("header.php");
include("connect.php");


?>

   
 <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>VIEW <em>ALL ORDER DETAIL</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              
            
			 
			  <div class="col-lg-12">
                <?php
				$custid=$_SESSION['custid'];
				$qur=mysql_query("select * from order_detail where cust_id='$custid'");
				if(mysql_num_rows($qur)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>ORDER ID</th>
								<th>ORDER DATE</th>
								<th>CART ID</th>
								<th>DELIVERY ADDRESS</th>
								<th>DELIVERY MOBILE NO</th>
								<th>ORDER AMOUNT</th>
								<th>PAYMENT TYPE</th>
								<th>VIEW ORDER DETIAL</th>
								
								
							</tr>";
					while($q=mysql_fetch_array($qur))
					{
						echo "<tr>";
						echo "<td>$q[0]</td>";
						echo "<td>$q[1]</td>";
						echo "<td>$q[2]</td>";
						
						
						echo "<td>$q[4]</td>";
						echo "<td>$q[5]</td>";
						echo "<td>Rs. $q[6]/-</td>";
						echo "<td>$q[7]</td>";
						echo "<td><a href='cust_view_order_detail.php?cartid=$q[2]'>VIEW ORDER DETAIL</a></td>";
						echo "</tr>";
					}
					echo "</table>";
							
				}else{
					echo "<h2>No Record Found</h2>";
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
                        <h2>Don???t <em>think</em>, begin <em>today</em>!</h2>
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
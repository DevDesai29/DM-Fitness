<?php
include("admin_header.php");
include("connect.php");


?>

   
 <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>CUSTOMER <em>DETAIL REPORT</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              
			  <div class="col-lg-12">
                <?php
				$qur=mysql_query("select * from cust_regis");
				if(mysql_num_rows($qur)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>CUSTOMER ID</th>
								<th>CUSTOMER NAME</th>
								
								<th>ADDRESS</th>
								
								<th>MOBILE NO</th>
								<th>EMAIL ID</th>
								<th>GENDER</th>
								<th>HEIGHT</th>
								<th>WEIGHT</th>
								
								<th>MEMBERSHIP BOOKING</th>
								<th>ORDER DETAIL</th>
							</tr>";
					while($q=mysql_fetch_array($qur))
					{
						echo "<tr>";
						echo "<td>$q[0]</td>";
						echo "<td>$q[1]</td>";
						echo "<td>$q[2] $q[3]</td>";
						
						
						echo "<td>$q[4]</td>";
						echo "<td>$q[5]</td>";
						echo "<td>$q[7]</td>";
						echo "<td>$q[8]</td>";
						echo "<td>$q[9]</td>";
						
						echo "<td><a href='admin_view_customerwise_membership_booking_report.php?cid=$q[0]'>MEMBERSHIP BOOKING REPORT</a></td>";
						echo "<td><a href='admin_view_customerwise_order_report.php?cid=$q[0]'>ORDER DETAIL REPORT</a></td>";
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
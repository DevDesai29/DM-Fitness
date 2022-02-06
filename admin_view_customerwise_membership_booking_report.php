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
                        <h2>CUSTOMER WISE <em>PACKAGE BOOKING DETAIL</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              
            
			 
			  <div class="col-lg-12">
                <?php
				$custid=$_REQUEST['cid'];
				$qur=mysql_query("select * from book_package_detail where cust_id='$custid'");
				if(mysql_num_rows($qur)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>BOOKING ID</th>
								<th>BOOKING DATE</th>
								
								<th>GYM START DATE</th>
								<th>GYM END DATE</th>
								<th>PACKAGE NAME</th>
								<th>DESCRIPTION</th>
								<th>PACKAGE TIMINGS</th>
								<th>PACKAGE AMOUNT</th>
								
							</tr>";
					while($q=mysql_fetch_array($qur))
					{
						echo "<tr>";
						echo "<td>$q[0]</td>";
						echo "<td>$q[1]</td>";
						echo "<td>$q[2]</td>";
						
						echo "<td>$q[3]</td>";
						$qur2=mysql_query("select * from package_detail where package_id='$q[4]'");
						$q2=mysql_fetch_array($qur2);
						echo "<td>$q2[1]</td>";
						echo "<td>$q2[3]</td>";
						echo "<td>$q2[4]</td>";
						echo "<td>Rs. $q2[5]/-</td>";
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
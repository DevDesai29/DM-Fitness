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
                        <h2>VIEW <em>COMPLAIN STATUS</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              
            
			 
			  <div class="col-lg-12">
                <?php
				$custid=$_SESSION['custid'];
				$qur=mysql_query("select * from complain_detail where cust_id='$custid'");
				if(mysql_num_rows($qur)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>COMPLAIN ID</th>
								<th>COMPLAIN DATE</th>
								<th>COMPLAIN DESCRIPTION</th>
								<th>COMPLAIN STATUS</th>							
							</tr>";
					while($q=mysql_fetch_array($qur))
					{
						echo "<tr>";
						echo "<td>$q[0]</td>";
						echo "<td>$q[1]</td>";
						echo "<td>$q[2]</td>";
						
						if($q[4]=="0")
						{
							echo "<td style='color:blue;'>COMPLAIN REGISTERED</td>";
						}else if($q[4]=="1")
						{
							echo "<td style='color:hotpink;'>COMPLAIN VIEWED</td>";
						}else if($q[4]=="2")
						{
							echo "<td style='color:orange;'>PENDING</td>";
						}else if($q[4]=="3")
						{
							echo "<td style='color:brown;'>ACTION TAKEN</td>";
						}else if($q[4]=="4")
						{
							echo "<td style='color:green;'>COMPLAIN SOLVED</td>";
						}else if($q[4]=="5")
						{
							echo "<td style='color:red;'>FAKE COMPLAIN</td>";
						}
						
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
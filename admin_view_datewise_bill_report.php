<?php
include("admin_header.php");
include("connect.php");


if(isset($_POST['btnreport']))
{
	$fdate=date("Y-m-d",strtotime($_POST['txtfdate']));
	$tdate=date("Y-m-d",strtotime($_POST['txttdate']));
}

?>

   
 <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>DATE WISE <em>BILL REPORT</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              
              <div class="col-lg-6">
                <section class='tabs-content'>
                  <div class="contact-form">
                        <form name="form1" method="post">
                          <div class="row">
                            
                            
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
							  SELECT FROM DATE
                                <input name="txtfdate" type="date"  value="<?php if(isset($fdate)){ echo $fdate; }else{ echo date("Y-m-d"); } ?>">
                              </fieldset>
                            </div>
							
                            
                          </div>
                       
                    </div>
                  
                  
                </section>
              </div>
			  <div class="col-lg-6">
                <section class='tabs-content'>
                  <div class="contact-form">
                        
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
							  SELECT TO DATE
                                <input name="txttdate" type="date"  value="<?php if(isset($tdate)){ echo $tdate; }else{ echo date("Y-m-d"); } ?>">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
							  
                                <button type="submit" name="btnreport" class="main-button" >REPORT</button>
							
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                  
                  
                </section>
              </div>
			  <div class="col-lg-12">
                <?php
				if(isset($_POST['btnreport']))
				{
					$qur=mysql_query("select * from bill_detail where bill_date>='$fdate' and bill_date<='$tdate'");
				if(mysql_num_rows($qur)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>BILL ID</th>
								<th>BILL DATE</th>
								<th>ORDER ID</th>
								<th>CART ID</th>
								<th>CUSTOMER ID</th>
								<th>CUSTOMER NAME</th>
								<th>ADDRESS</th>
								<th>MOBILE NO</th>
								<th>BILL AMOUNT</th>
								
								<th>VIEW BILL</th>
								
								
							</tr>";
					while($q=mysql_fetch_array($qur))
					{
						echo "<tr>";
						echo "<td>$q[0]</td>";
						echo "<td>$q[1]</td>";
						echo "<td>$q[2]</td>";
						echo "<td>$q[3]</td>";
						
						echo "<td>$q[4]</td>";
						$qur1=mysql_query("select * from cust_regis where cust_id='$q[4]'");
						$q1=mysql_fetch_array($qur1);
						echo "<td>$q1[1]</td>";
						echo "<td>$q1[2]</td>";
						echo "<td>$q1[4]</td>";
						
						echo "<td>Rs. $q[5]/-</td>";
						
						echo "<td><a href='bill.php?bdid=$q[0]' target='_blank'>VIEW BILL</a></td>";
						echo "</tr>";
					}
					echo "</table>";
							
				}else{
					echo "<h2>No Record Found</h2>";
				}
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
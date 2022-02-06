<?php
session_start();
include("admin_header.php");
include("connect.php");

if(isset($_REQUEST['ordid']))
{
	$oid=$_REQUEST['ordid'];
	$bdate=date("Y-m-d");
	
	$res5=mysql_query("select * from order_detail where order_id='$oid'");
	$r5=mysql_fetch_array($res5);
	$cartid=$r5[2];
	$custid=$r5[3];
	$oamt=$r5[6];
	
	$res1=mysql_query("select max(bill_id) from bill_detail");
	$bid=0;
	while($r1=mysql_fetch_array($res1))
	{
		$bid=$r1[0];
	}
	$bid++;
		
	$query="insert into bill_detail values('$bid','$bdate','$oid','$cartid','$custid','$oamt')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Bill Generated Successfully');";
		echo "window.location.href='bill.php?bid=$bid';";
		echo "</script>";
	}
}
?>

   
 <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>VIEW <em>NEW ORDER DETAIL</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              
            
			 
			  <div class="col-lg-12">
                <?php
			
				$qur=mysql_query("select * from order_detail where order_id not in(select order_id from bill_detail)");
				if(mysql_num_rows($qur)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>ORDER ID</th>
								<th>ORDER DATE</th>
								<th>CART ID</th>
								<th>CUSTOMER NAME</th>
								<th>DELIVERY ADDRESS</th>
								<th>DELIVERY MOBILE NO</th>
								<th>ORDER AMOUNT</th>
								<th>PAYMENT TYPE</th>
								<th>VIEW ORDER DETIAL</th>
								<th>GENERATE BILL</th>
								
							</tr>";
					while($q=mysql_fetch_array($qur))
					{
						echo "<tr>";
						echo "<td>$q[0]</td>";
						echo "<td>$q[1]</td>";
						echo "<td>$q[2]</td>";
						$qur1=mysql_query("select * from cust_regis where cust_id='$q[3]'");
						$q1=mysql_fetch_array($qur1);
						
						echo "<td>$q1[1]</td>";
						echo "<td>$q[4]</td>";
						echo "<td>$q[5]</td>";
						echo "<td>Rs. $q[6]/-</td>";
						echo "<td>$q[7]</td>";
						echo "<td><a href='admin_view_order_detail.php?cartid=$q[2]'>VIEW ORDER DETAIL</a></td>";
						echo "<td><a href='admin_view_new_order.php?ordid=$q[0]'>GENERATE BILL</a></td>";
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
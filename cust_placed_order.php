<?php
session_start();
include("header.php");
include("connect.php");

?>
<script type="text/javascript">
function validation()
{
	
	
	if(form1.txtadd.value=="")
	{
		alert("Please Enter Delivery Address");
		form1.txtadd.focus();
		return false;
	}
	
	
	var v=/^[0-9]+$/;
	if(form1.txtmno.value=="")
	{
		alert("Please Enter Delivery Mobile No");
		form1.txtmno.focus();
		return false;
	}else if(form1.txtmno.value.length!=10){
		alert("Please Enter Delivery Mobile No 10 Digit Long");
		form1.txtmno.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtmno.value))
		{
			alert("Please Enter Only Digits in Delivery Mobile No");
			form1.txtmno.focus();
			return false;
		}
	}
	
	if(form1.selptype.value=="0")
	{
		alert("Please Select Payment Type");
		form1.selptype.focus();
		return false;
	}
	
}
</script>
<?php
if(isset($_POST['btnplaced']))
{
	
	$add=$_POST['txtadd'];
	
	$mno=$_POST['txtmno'];
	$ptype=$_POST['selptype'];
	$cartid=$_SESSION['cartid'];
	$custid=$_SESSION['custid'];
	$odate=date("Y-m-d");
	
	
	$res2=mysql_query("select sum(qty*price) from cart_detail where cart_id='$cartid'");
	$r2=mysql_fetch_array($res2);
	$oamt=$r2[0];
	
	$res1=mysql_query("select max(order_id) from order_detail");
	$orderid=0;
	while($r1=mysql_fetch_array($res1))
	{
		$orderid=$r1[0];
	}
	$orderid++;
		
	$query="insert into order_detail values('$orderid','$odate','$cartid','$custid','$add','$mno','$oamt','$ptype')";
	if(mysql_query($query))
	{
		if($ptype=="ONLINE")
		{
			echo "<script type='text/javascript'>";
			echo "alert('Order Placed Successfully');";
			echo "window.location.href='payment.php?oid=$orderid&oamt=$oamt';";
			echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Order Placed Successfully');";
			echo "window.location.href='thank_you.php?oid=$orderid&oamt=$oamt';";
			echo "</script>";
		}
	}
}
?>
   
 <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>ORDER<em> FORM</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-6">
                <?php
				$cartid=$_SESSION['cartid'];
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
                        <form  name="form1" method="post">
                          <div class="row">
                            
							<div class="col-lg-12 col-sm-12">
                              <fieldset>
                                <textarea name="txtadd" rows="3" placeholder="Enter Delivery Address" ></textarea>
                              </fieldset>
                            </div>
							
							
							<div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="txtmno" type="text"  placeholder="Enter Delivery Mobile No" >
                              </fieldset>
                            </div>
                          
							
							
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <select name="selptype" >
									<option value="0">--Select Paymnet Type--</option>
									<option value="ONLINE">ONLINE</option>
									<option value="COD">CASH ON DELIVERY</option>
								</select>
                              </fieldset>
                            </div>
                           
							
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" name="btnplaced" onclick="return validation();" class="main-button">PLACED YOUR ORDER</button>
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
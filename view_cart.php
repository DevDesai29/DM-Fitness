<?php
session_start();
include("header.php");
include("connect.php");

if(isset($_REQUEST['dcdid']))
{
	$cdid=$_REQUEST['dcdid'];
	$query="delete from cart_detail where cart_detail_id='$cdid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Product Deleted From Cart Successfully');";
		echo "window.location.href='view_cart.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['ucdid']))
{
	$cdid=$_REQUEST['ucdid'];
	$res2=mysql_query("select * from cart_detail where cart_detail_id='$cdid'");
	$r2=mysql_fetch_array($res2);
	$pid1=$r2[2];
	$qty1=$r2[3];
	$price1=$r2[4];
	$res1=mysql_query("select * from gym_products where product_id='$pid1'");
	$r1=mysql_fetch_array($res1);
	$pname1=$r1[1];
	
	
}

if(isset($_REQUEST['orderid']))
{
	if(isset($_SESSION['custid']))
	{
		header("Location: cust_placed_order.php");
	}else{
		$_SESSION['ordid']="x";
		header("Location: login.php");
	}
}

?>
<script type="text/javascript">  
function validation()
{
	if(form1.txtqty.value=="")
	{
		alert("Please Enter Quantity");
		form1.txtqty.focus();
		return false;
	}else if((parseInt(form1.txtqty.value))<=0)
	{
		alert("Please Enter Quantity Greater Than 0");
		form1.txtqty.focus();
		return false;
	}else if((parseInt(form1.txtqty.value))>10)
	{
		alert("Please Enter Quantity Less Than 10");
		form1.txtqty.focus();
		return false;
	}else{
		if(!v.test(form1.txtqty.value))
		{
			alert("Please Enter Only Digit in Quantity");
			form1.txtqty.focus();
			return false;
		}
	}
}
</script>
<?php

if(isset($_POST['btnupdate']))
{
	$qty=$_POST['txtqty'];
	$cdid=$_REQUEST['ucdid'];
	$query="update cart_detail set qty='$qty' where cart_detail_id='$cdid'";
	
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Product Updated Into Cart Successfully');";
		echo "window.location.href='view_cart.php';";
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
                        <h2>CART<em> DETAIL</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
			<?php
			if(isset($_REQUEST['ucdid']))
			{
			?>
               <div class="col-lg-6">
                <section class='tabs-content'>
                  <div class="contact-form">
				  
                        <form name="form1" method="post">
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <h4>Product Name : <?php echo $pname1; ?> </h4>
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
							  Enter Quantity
                               <input name="txtqty" type="text" placeholder="Enter Quantity" value="<?php echo $qty1; ?>" >
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <h4>Price : &#8377; <?php echo $price1; ?> /-</h4>
                              </fieldset>
                            </div>
                           
                            <div class="col-lg-12">
                              <fieldset>
							 
									<button type="submit" name="btnupdate" class="main-button" onclick="return validation();">UPDATE</button>
									<br/><br/>
							
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                  
                  
                </section>
              </div>   
			<?php
			}
			?>
			  <div class="col-lg-12">
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
								<th>UPDATE</th>
								<th>DELETE</th>
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
						echo "<td><a href='view_cart.php?ucdid=$q[0]'>UPDATE</a></td>";
						echo "<td><a href='view_cart.php?dcdid=$q[0]'>DELETE</a></td>";
						echo "</tr>";
					}
					echo "</table><br/><br/>";
					echo "<h3>Total Amount: &#8377; $tot /-</h3>";
					echo "<div class='main-button'><a href='view_cart.php?orderid=x' >PLACED ORDER</a></div>";
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
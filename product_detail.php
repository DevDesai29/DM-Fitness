<?php
session_start();
include("header.php");
include("connect.php");
$pid=$_REQUEST['pid'];
$res1=mysql_query("select * from gym_products where product_id='$pid'");
$r1=mysql_fetch_array($res1);
$name=$r1[1];
$desc=$r1[2];
$price=$r1[3];
$pimg1=$r1[4];
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
if(isset($_POST['btncart']))
{
	$qty=$_POST['txtqty'];
	if(isset($_SESSION['cartid']))
	{
		$cartid=$_SESSION['cartid'];
		$res2=mysql_query("select max(cart_detail_id) from cart_detail");
		$cartdid=0;
		while($r2=mysql_fetch_array($res2))
		{
			$cartdid=$r2[0];
		}
		$cartdid++;
		$query2="insert into cart_detail values('$cartdid','$cartid','$pid','$qty','$price')";
		if(mysql_query($query2))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Product Added Into Cart');";
			echo "window.location.href='product.php';";
			echo "</script>";
		}
	}else{
		$cdate=date("Y-m-d");
		$res1=mysql_query("select max(cart_id) from cart_master");
		$cartid=0;
		while($r1=mysql_fetch_array($res1))
		{
			$cartid=$r1[0];
		}
		$cartid++;
		$query="insert into cart_master values('$cartid','$cdate')";
		if(mysql_query($query))
		{
			$_SESSION['cartid']=$cartid;
			$res2=mysql_query("select max(cart_detail_id) from cart_detail");
			$cartdid=0;
			while($r2=mysql_fetch_array($res2))
			{
				$cartdid=$r2[0];
			}
			$cartdid++;
			$query2="insert into cart_detail values('$cartdid','$cartid','$pid','$qty','$price')";
			if(mysql_query($query2))
			{
				echo "<script type='text/javascript'>";
				echo "alert('Product Added Into Cart');";
				echo "window.location.href='product.php';";
				echo "</script>";
			}
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
                        <h2>PRODUCT <em>DETAIL</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-6">
                <ul>
                  <li> <img src="<?php echo $pimg1; ?>" style="width:380px; height:450px; margin-left:100px;"alt="First Class"></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <section class='tabs-content'>
                  <div class="contact-form">
                        <form id="contact" name="form1" method="post">
                          <div class="row">
                            <h4>Product Name: <?php echo $name; ?></h4>
							
							<h4>Descirption: <?php echo $desc; ?></h4>
							
							<h4>Price: &#8377; <?php echo $price; ?> /-</h4>
							<br/>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="txtqty" type="number" placeholder="Enter Product Quantity">
                              </fieldset>
                            </div>
                           
                            
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" name="btncart" onclick="return validation();" class="main-button">ADD TO CART</button>
								
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
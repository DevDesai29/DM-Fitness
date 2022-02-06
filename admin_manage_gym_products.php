<?php
include("admin_header.php");
include("connect.php");

$res1=mysql_query("select max(product_id) from gym_products");
$pid=0;
while($r1=mysql_fetch_array($res1))
{
	$pid=$r1[0];
}
$pid++;
?>
<script type="text/javascript">
function validation()
{
	var v=/^[a-zA-Z0-9 ]+$/
	if(form1.txtname.value=="")
	{
		alert("Please Enter Product Name");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets And Digits in Product Name");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtdesc.value=="")
	{
		alert("Please Enter Product Description");
		form1.txtdesc.focus();
		return false;
	}
	
		
	var v=/^[0-9]+$/
	if(form1.txtprice.value=="")
	{
		alert("Please Enter Product Price");
		form1.txtprice.focus();
		return false;
	}else if((parseInt(form1.txtprice.value))<=0)
	{
		alert("Please Enter Product Price Greater Than 0");
		form1.txtprice.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtprice.value))
		{
			alert("Please Enter Only Digits in Package Price");
			form1.txtprice.focus();
			return false;
		}
	}
	
	var fname=document.getElementById('txtimg').value;
	var ext=fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
	if(document.getElementById('txtimg').value=="")
	{
		alert("Please Select Product Image");
		return false;
	}else{
		if(!(ext=="jpg" || ext=="png"|| ext=="jpeg"))
		{
			alert("Please Select Product Image in Format like jpg jpeg or png");
			return false;
		}
	}
}

function validation1()
{
	var v=/^[a-zA-Z0-9 ]+$/
	if(form1.txtname.value=="")
	{
		alert("Please Enter Product Name");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets And Digits in Product Name");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtdesc.value=="")
	{
		alert("Please Enter Product Description");
		form1.txtdesc.focus();
		return false;
	}
	
		
	var v=/^[0-9]+$/
	if(form1.txtprice.value=="")
	{
		alert("Please Enter Product Price");
		form1.txtprice.focus();
		return false;
	}else if((parseInt(form1.txtprice.value))<=0)
	{
		alert("Please Enter Product Price Greater Than 0");
		form1.txtprice.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtprice.value))
		{
			alert("Please Enter Only Digits in Package Price");
			form1.txtprice.focus();
			return false;
		}
	}
	
	var fname=document.getElementById('txtimg').value;
	var ext=fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
	if(document.getElementById('txtimg').value!="")
	{
		if(!(ext=="jpg" || ext=="png"|| ext=="jpeg"))
		{
			alert("Please Select Product Image in Format like jpg jpeg or png");
			return false;
		}
	}
}
</script> 
<?php
if(isset($_POST['btnsave']))
{
	$pid=$_POST['txtpid'];
	$pname=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	$price=$_POST['txtprice'];
	
	$tpath=$_FILES['txtimg']['tmp_name'];
	$ipath="prod_img/P".$pid."_".rand(1000,9999).".png";
	$query="insert into gym_products values('$pid','$pname','$desc','$price','$ipath')";
	if(mysql_query($query))
	{
		move_uploaded_file($tpath,$ipath);
		echo "<script type='text/javascript'>";
		echo "alert('Record Saved Successfully');";
		echo "window.location.href='admin_manage_gym_products.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['upid']))
{
	$pid=$_REQUEST['upid'];
	$res2=mysql_query("select * from gym_products where product_id='$pid'");
	$r2=mysql_fetch_array($res2);
	$pname1=$r2[1];
	

	$desc1=$r2[2];
	$price1=$r2[3];
	$pimg1=$r2[4];
}


if(isset($_POST['btnupdate']))
{
	$pid=$_POST['txtpid'];
	$pname=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	$price=$_POST['txtprice'];
	
	if($_FILES['txtimg']['size']>0)
	{
		$tpath=$_FILES['txtimg']['tmp_name'];
		$ipath="prod_img/P".$pid."_".rand(1000,9999).".png";
		move_uploaded_file($tpath,$ipath);
		$query="update gym_products set product_name='$pname',description='$desc',price='$price',product_img='$ipath' where product_id='$pid'";
	}else{
		$query="update gym_products set product_name='$pname',description='$desc',price='$price' where product_id='$pid'";
	}
	
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Record Updated Successfully');";
		echo "window.location.href='admin_manage_gym_products.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['dpid']))
{
	$pid=$_REQUEST['dpid'];
	$query="delete from gym_products where product_id='$pid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Record Deleted Successfully');";
		echo "window.location.href='admin_manage_gym_products.php';";
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
                        <h2>MANAGE <em>GYM PRODUCT DETAIL</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              
              <div class="col-lg-6">
                <section class='tabs-content'>
                  <div class="contact-form">
                        <form name="form1" method="post" enctype="multipart/form-data">
                          <div class="row">
                            
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="txtpid" type="text" value="<?php echo $pid; ?>" readonly>
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="txtname" type="text" placeholder="Enter Product Name" value="<?php echo $pname1; ?>">
                              </fieldset>
                            </div>
							
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="txtdesc" rows="3" placeholder="Enter Product Description" ><?php echo $desc1; ?></textarea>
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
                                <input name="txtprice" type="text" placeholder="Enter Product Price" value="<?php echo $price1; ?>">
                              </fieldset>
                            </div>
                           <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="txtimg" id="txtimg" type="file" >
								
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
							  <?php
							  if(isset($_REQUEST['upid']))
							  {	
								?>
								<br/><br/>
									<img src="<?php echo $pimg1; ?>" style="width:200px; height:150px;">
									<button type="submit" name="btnupdate" class="main-button" onclick="return validation1();">UPDATE</button>
								<?php
							  }else{
							  ?>
							  <br/><br/><br/><br/>
                                <button type="submit" name="btnsave" class="main-button" onclick="return validation();">SAVE</button>
							<?php
								}
							?>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                  
                  
                </section>
              </div>
			  <div class="col-lg-12">
                <?php
				$qur=mysql_query("select * from gym_products");
				if(mysql_num_rows($qur)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>PRODUCT ID</th>
								<th>PRODUCT NAME</th>
								
								<th>DESCRIPTION</th>
								<th>PRICE</th>
								<th>PRODUCT IMAGE</th>
								<th>UPDATE</th>
								<th>DELETE</th>
							</tr>";
					while($q=mysql_fetch_array($qur))
					{
						echo "<tr>";
						echo "<td>$q[0]</td>";
						echo "<td>$q[1]</td>";
						echo "<td>$q[2]</td>";
						
						echo "<td>$q[3]</td>";
						echo "<td><a href='$q[4]' target='_blank'><img src='$q[4]' style='width:150px; height:150px;'></a></td>";
						
						echo "<td><a href='admin_manage_gym_products.php?upid=$q[0]'>UPDATE</a></td>";
						echo "<td><a href='admin_manage_gym_products.php?dpid=$q[0]'>DELETE</a></td>";
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
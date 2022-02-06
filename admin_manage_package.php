<?php
include("admin_header.php");
include("connect.php");

$res1=mysql_query("select max(package_id) from package_detail");
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
		alert("Please Enter Package Name");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets And Digits in Package Name");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtdesc.value=="")
	{
		alert("Please Enter Package Description");
		form1.txtdesc.focus();
		return false;
	}
	
	if(form1.selmember.value=="0")
	{
		alert("Please Select Membership");
		form1.selmember.focus();
		return false;
	}
	
	if(form1.seltimings.value=="0")
	{
		alert("Please Select Package Timings");
		form1.seltimings.focus();
		return false;
	}
	
	var v=/^[0-9]+$/
	if(form1.txtcharges.value=="")
	{
		alert("Please Enter Package Charges");
		form1.txtcharges.focus();
		return false;
	}else if((parseInt(form1.txtcharges.value))<=0)
	{
		alert("Please Enter Package Charges Greater Than 0");
		form1.txtcharges.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtcharges.value))
		{
			alert("Please Enter Only Digits in Package Charges");
			form1.txtcharges.focus();
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
	$mid=$_POST['selmember'];
	$ptimings=$_POST['seltimings'];
	$pcharges=$_POST['txtcharges'];
	$query="insert into package_detail values('$pid','$pname','$mid','$desc','$ptimings','$pcharges')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Record Saved Successfully');";
		echo "window.location.href='admin_manage_package.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['upid']))
{
	$pid=$_REQUEST['upid'];
	$res2=mysql_query("select * from package_detail where package_id='$pid'");
	$r2=mysql_fetch_array($res2);
	$pname1=$r2[1];
	$mid1=$r2[2];

	$desc1=$r2[3];
	$ptimings1=$r2[4];
	$pcharges1=$r2[5];
}


if(isset($_POST['btnupdate']))
{
	$pid=$_POST['txtpid'];
	$pname=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	$mid=$_POST['selmember'];
	$ptimings=$_POST['seltimings'];
	$pcharges=$_POST['txtcharges'];
	$query="update package_detail set package_name='$pname',membership_id='$mid',package_description='$desc',package_timings='$ptimings',package_charges='$pcharges' where package_id='$pid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Record Updated Successfully');";
		echo "window.location.href='admin_manage_package.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['dpid']))
{
	$pid=$_REQUEST['dpid'];
	$query="delete from package_detail where package_id='$pid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Record Deleted Successfully');";
		echo "window.location.href='admin_manage_package.php';";
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
                        <h2>MANAGE <em>PACKAGE DETAIL</em></h2>
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
                                <input name="txtpid" type="text" value="<?php echo $pid; ?>" readonly>
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="txtname" type="text" placeholder="Enter Package Name" value="<?php echo $pname1; ?>">
                              </fieldset>
                            </div>
							
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="txtdesc" rows="3" placeholder="Enter Package Description" ><?php echo $desc1; ?></textarea>
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
                                <select name="selmember" >
									<option value="0">--Select Membership--</option>
								<?php
								$qur9=mysql_query("select * from membership_detail");
								while($q9=mysql_fetch_array($qur9))
								{
									?>
									<option value="<?php echo $q9[0]; ?>" <?php if($mid1==$q9[0]){ echo "selected='selected'"; } ?>><?php echo $q9[1]; ?></option>
									<?php
								}
								?>
								</select>
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <select name="seltimings" >
									<option value="0">--Select Package Timings--</option>
									<option value="1 Months" <?php if($ptimings1=="1 Months"){ echo "selected='selected'"; } ?>>1 Months</option>
									<option value="3 Months" <?php if($ptimings1=="3 Months"){ echo "selected='selected'"; } ?> >3 Months</option>
									<option value="6 Months" <?php if($ptimings1=="6 Months"){ echo "selected='selected'"; } ?>>6 Months</option>
									<option value="12 Months" <?php if($ptimings1=="12 Months"){ echo "selected='selected'"; } ?>>12 Months</option>
								</select>
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="txtcharges" type="text" placeholder="Enter Package Charges" value="<?php echo $pcharges1; ?>">
                              </fieldset>
                            </div>
                           
                            <div class="col-lg-12">
                              <fieldset>
							  <?php
							  if(isset($_REQUEST['upid']))
							  {
								?>
									<button type="submit" name="btnupdate" class="main-button" onclick="return validation();">UPDATE</button>
								<?php
							  }else{
							  ?>
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
				$qur=mysql_query("select * from package_detail");
				if(mysql_num_rows($qur)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>PACKAGE ID</th>
								<th>PACKAGE NAME</th>
								<th>MEMBERSHIP NAME</th>
								<th>DESCRIPTION</th>
								<th>TIMINGS</th>
								<th>CHARGES</th>
								<th>UPDATE</th>
								<th>DELETE</th>
							</tr>";
					while($q=mysql_fetch_array($qur))
					{
						echo "<tr>";
						echo "<td>$q[0]</td>";
						echo "<td>$q[1]</td>";
						//echo "<td>$q[2]</td>";
						$qur2=mysql_query("select * from membership_detail where membership_id='$q[2]'");
						$q2=mysql_fetch_array($qur2);
						echo "<td>$q2[1]</td>";
						echo "<td>$q[3]</td>";
						echo "<td>$q[4]</td>";
						echo "<td>$q[5]</td>";
						echo "<td><a href='admin_manage_package.php?upid=$q[0]'>UPDATE</a></td>";
						echo "<td><a href='admin_manage_package.php?dpid=$q[0]'>DELETE</a></td>";
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
<?php
include("admin_header.php");
include("connect.php");

$res1=mysql_query("select max(membership_id) from membership_detail");
$mid=0;
while($r1=mysql_fetch_array($res1))
{
	$mid=$r1[0];
}
$mid++;
?>
<script type="text/javascript">
function validation()
{
	var v=/^[a-zA-Z ]+$/
	if(form1.txtname.value=="")
	{
		alert("Please Enter Membership Name");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets in Membership Name");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtdesc.value=="")
	{
		alert("Please Enter Membership Description");
		form1.txtdesc.focus();
		return false;
	}
	
}
</script> 
<?php
if(isset($_POST['btnsave']))
{
	$mid=$_POST['txtmid'];
	$mname=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	
	$query="insert into membership_detail values('$mid','$mname','$desc')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Record Saved Successfully');";
		echo "window.location.href='admin_manage_membership.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['umid']))
{
	$mid=$_REQUEST['umid'];
	$res2=mysql_query("select * from membership_detail where membership_id='$mid'");
	$r2=mysql_fetch_array($res2);
	$mname1=$r2[1];
	$desc1=$r2[2];
}


if(isset($_POST['btnupdate']))
{
	$mid=$_POST['txtmid'];
	$mname=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	
	$query="update membership_detail set membership_name='$mname',description='$desc' where membership_id='$mid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Record Updated Successfully');";
		echo "window.location.href='admin_manage_membership.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['dmid']))
{
	$mid=$_REQUEST['dmid'];
	$query="delete from membership_detail where membership_id='$mid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Record Deleted Successfully');";
		echo "window.location.href='admin_manage_membership.php';";
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
                        <h2>MANAGE <em>MEMBERSHIP DETAIL</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-7">
                <?php
				$qur=mysql_query("select * from membership_detail");
				if(mysql_num_rows($qur)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>MEMBERSHIP ID</th>
								<th>MEMBERSHIP NAME</th>
								<th>DESCRIPTION</th>
								<th>UPDATE</th>
								<th>DELETE</th>
							</tr>";
					while($q=mysql_fetch_array($qur))
					{
						echo "<tr>";
						echo "<td>$q[0]</td>";
						echo "<td>$q[1]</td>";
						echo "<td>$q[2]</td>";
						echo "<td><a href='admin_manage_membership.php?umid=$q[0]'>UPDATE</a></td>";
						echo "<td><a href='admin_manage_membership.php?dmid=$q[0]'>DELETE</a></td>";
						echo "</tr>";
					}
					echo "</table>";
							
				}else{
					echo "<h2>No Record Found</h2>";
				}
				?>
              </div>
              <div class="col-lg-5">
                <section class='tabs-content'>
                  <div class="contact-form">
                        <form name="form1" method="post">
                          <div class="row">
                            
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="txtmid" type="text" value="<?php echo $mid; ?>" readonly>
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="txtname" type="text" placeholder="Enter Membership Name" value="<?php echo $mname1; ?>">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="txtdesc" rows="3" placeholder="Enter Membership Description" ><?php echo $desc1; ?></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
							  <?php
							  if(isset($_REQUEST['umid']))
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
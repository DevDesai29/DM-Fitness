<?php
session_start();
include("admin_header.php");
include("connect.php");


$cid=$_REQUEST['compid'];
$cstatus=$_REQUEST['cstatus'];

if(isset($_POST['btnupdate']))
{
	$stat=$_POST['selstatus'];
	$query="update complain_detail set status='$stat' where complain_id='$cid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Complain Status Updated Successfully');";
		echo "window.location.href='admin_view_complain.php';";
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
                        <h2>UPDATE<em> COMPLAIN STATUS</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-6">
                <ul>
                  <li> <img src="assets/images/log1.jpg" style="width:380px; height:250px; margin-left:100px;"alt="First Class"></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <section class='tabs-content'>
                  <div class="contact-form">
                        <form id="contact" action="" method="post">
                          <div class="row">
                            
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="txtcid" type="text" value="<?php echo $cid; ?>" readonly>
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                              <select name="selstatus">
								<option value="0" <?php if($cstatus=="0"){ echo "selected='selected'"; } ?>>COMPLAIN REGISTERED</option>
								<option value="1" <?php if($cstatus=="1"){ echo "selected='selected'"; } ?>>COMPLAIN VIEWED</option>
								<option value="2" <?php if($cstatus=="2"){ echo "selected='selected'"; } ?>>PENDING</option>
								<option value="3" <?php if($cstatus=="3"){ echo "selected='selected'"; } ?>>ACTION TAKEN</option>
								<option value="4" <?php if($cstatus=="4"){ echo "selected='selected'"; } ?>>COMPLAIN SOLVED</option>
								<option value="5" <?php if($cstatus=="5"){ echo "selected='selected'"; } ?>>FAKE COMPLAIN</option>
							  </select>
                              </fieldset>
                            </div>
                            
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" name="btnupdate" class="main-button">UPDATE STATUS</button>
								
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
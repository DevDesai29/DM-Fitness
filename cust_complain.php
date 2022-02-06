<?php
session_start();
include("header.php");
include("connect.php");

?>
<script type="text/javascript">
function validation()
{
	if(form1.txtdesc.value=="")
	{
		alert("Please Enter Complain Description");
		form1.txtdesc.focus();
		return false;
	}
}
</script>
<?php
if(isset($_POST['btnsubmit']))
{
	
	$desc=$_POST['txtdesc'];
	$cdate=date("Y-m-d");
	$mno=$_POST['txtmno'];
	
	$custid=$_SESSION['custid'];
	
	$res1=mysql_query("select max(complain_id) from complain_detail");
	$compid=0;
	while($r1=mysql_fetch_array($res1))
	{
		$compid=$r1[0];
	}
	$compid++;
		
	$query="insert into complain_detail values('$compid','$cdate','$desc','$custid','0')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Complain Submitted Successfully');";
		echo "window.location.href='cust_view_complain_status.php';";
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
                        <h2>COMPLAIN<em> FORM</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-6">
                 <ul>
                  <li> <img src="assets/images/complain1.jpg" style="width:380px; height:250px; margin-left:100px;"alt="First Class"></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <section class='tabs-content'>
                  <div class="contact-form">
                        <form  name="form1" method="post">
                          <div class="row">
                            
							<div class="col-lg-12 col-sm-12">
                              <fieldset>
                                <textarea name="txtdesc" rows="3" placeholder="Enter Complain Description" ></textarea>
                              </fieldset>
                            </div>
							
							
							
                           
							
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" name="btnsubmit" onclick="return validation();" class="main-button">SUBMIT COMPLAIN</button>
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
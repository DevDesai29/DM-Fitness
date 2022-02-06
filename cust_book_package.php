<?php
session_start();
include("header.php");
include("connect.php");

$pid=$_SESSION['packid'];

if(isset($_POST['btnbook']))
{
	$res5=mysql_query("select * from package_detail where package_id='$pid'");
	$r5=mysql_fetch_array($res5);
	$packagetimings=$r5[4];
	$pamt=$r5[5];
	$gsdate=date("Y-m-d",strtotime($_POST['txtsdate']));
	$gedate=date("Y-m-d",strtotime("$gsdate + $packagetimings"));
	$bdate=date("Y-m-d");
	$custid=$_SESSION['custid'];
	
	$res1=mysql_query("select max(book_id) from book_package_detail");
	$bid=0;
	while($r1=mysql_fetch_array($res1))
	{
		$bid=$r1[0];
	}
	$bid++;
	
	$query="insert into book_package_detail values('$bid','$bdate','$gsdate','$gedate','$pid','$custid','$pamt')";
	if(mysql_query($query))
	{
		unset($_SESSION['packid']);
		echo "<script type='text/javascript'>";
		echo "alert('Package Booked Successfully');";
		echo "window.location.href='payment.php?bid=$bid';";
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
                        <h2>book @ <em>package</em></h2>
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
								Package Id
                                <input name="txtpid" type="text" value="<?php echo $pid; ?>" readonly>
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
								Select Gym Start Date:
                                <input name="txtsdate" type="date" value="<?php echo date("Y-m-d",strtotime("+1 days")); ?>" min="<?php echo date("Y-m-d",strtotime("+1 days")); ?>">
                              </fieldset>
                            </div>
                           
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" name="btnbook" class="main-button">BOOK PACKAGE</button>
								
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
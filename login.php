<?php
session_start();
include("header.php");
include("connect.php");

if(isset($_POST['btnregis']))
{
	header("Location: regis.php");
}

if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$res1=mysql_query("select * from admin_login where email_id='$email' and pwd='$pwd'");
	if(mysql_num_rows($res1)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Admin Login Successfully');";
		echo "window.location.href='admin_manage_membership.php';";
		echo "</script>";
	}else{
		$res2=mysql_query("select * from cust_regis where email_id='$email' and pwd='$pwd'");
		if(mysql_num_rows($res2)>0)
		{
			$r2=mysql_fetch_array($res2);
			$_SESSION['custid']=$r2[0];
			if(isset($_SESSION['packid']))
			{
				echo "<script type='text/javascript'>";
				echo "alert('Customer Login Successfully');";
				echo "window.location.href='cust_book_package.php';";
				echo "</script>";
			}else if(isset($_SESSION['ordid']))
			{
				unset($_SESSION['ordid']);
				echo "<script type='text/javascript'>";
				echo "alert('Customer Login Successfully');";
				echo "window.location.href='cust_placed_order.php';";
				echo "</script>";
			}else{
				echo "<script type='text/javascript'>";
				echo "alert('Customer Login Successfully');";
				echo "window.location.href='product.php';";
				echo "</script>";
			}
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Check Your Email ID or Password');";
			echo "window.location.href='login.php';";
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
                        <h2>LOGIN @ <em>DM Fitness Studio</em></h2>
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
                                <input name="txtemail" type="email" placeholder="Enter Your Email ID">
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="txtpwd" type="password" placeholder="******">
                              </fieldset>
                            </div>
                            
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" name="btnlogin" class="main-button">LOGIN</button>
								<button type="submit" name="btnregis" class="main-button">REGISTER</button>
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
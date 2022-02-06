<?php
session_start();
include("header.php");
include("connect.php");

if(isset($_REQUEST['pid']))
{
	$pid=$_REQUEST['pid'];
	$pamt=$_REQUEST['pamt'];
	if(isset($_SESSION['custid']))
	{
		$_SESSION['packid']=$pid;
		header("Location: cust_book_package.php");
	}else{
		$_SESSION['packid']=$pid;
		header("Location: login.php");
	}
}
?>
   

   
 <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Membership <em>Detail</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
             <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                 <?php
				 $qur=mysql_query("select * from membership_detail");
				 while($q=mysql_fetch_array($qur))
				 {
				 ?>
				  <br/>
				  <div class="main-rounded-button"><a href="view_membership.php?mid=<?php echo $q[0]; ?>"><?php echo $q[1]; ?></a></div>
                 <?php
				 }
				 ?>
                
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>
				<?php
				if(isset($_REQUEST['mid']))
				{
					$mid=$_REQUEST['mid'];
					$res=mysql_query("select * from package_detail where membership_id='$mid'");
				}else{
					$res=mysql_query("select * from package_detail where membership_id='1'");
					
				}
				
				if(mysql_num_rows($res)>0)
				{
					while($r=mysql_fetch_array($res))
					{
				?>
                  <article id=''>
                   
                    <h4><?php echo $r[1]; ?></h4>
                    <p><?php echo $r[3]; ?></p>
					<p><?php echo $r[4]; ?></p>
					<h5>Rs. <?php echo $r[5]; ?>/-</h5>
                    <div class="main-button">
                        <a href="view_membership.php?pid=<?php echo $r[0]; ?>&pamt=<?php echo $r[5]; ?>">BOOK PACKAGE</a>
                    </div>
					<hr/>
                  </article>
                <?php
					}
				}else{
					echo "<h2>No Package Found</h2>";
				}
				?>
                 
                 
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
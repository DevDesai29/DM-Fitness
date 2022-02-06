<?php
session_start();
include("header.php");
include("connect.php");


?>
   

    <!-- ***** Our Classes End ***** -->
     <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>GYM <em> PRODUCTS</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row">
			<?php
			$res1=mysql_query("select * from gym_products");
			if(mysql_num_rows($res1)>0)
			{
				while($r1=mysql_fetch_array($res1))
				{
			?>
                <div class="col-lg-4" style="margin-bottom:25px;">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="<?php echo $r1[4]; ?>" style="width:270px; height:390px;" alt="">
                        </div>
                        <div class="down-content">
                            <span>Strength Trainer</span>
                            <h4><?php echo $r1[1]; ?></h4>
                            <p>Price: &#8377; <?php echo $r1[3]; ?>/-</p>
                            <ul class="social-icons">
                                <li><a href="product_detail.php?pid=<?php echo $r1[0]; ?>"><i class="fa fa-shopping-cart"></i> Add To Cart</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
				}
			}else{
				echo "<h2>No Record Found</h2>";
			}
			?>
            </div>
        </div>
    </section>
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
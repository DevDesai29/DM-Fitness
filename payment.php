<?php
session_start();
include("header.php");
include("connect.php");
if(isset($_REQUEST['bid']))
{
	$bid=$_REQUEST['bid'];
	$res9=mysql_query("select * from book_package_detail where book_id='$bid'");
	$r9=mysql_fetch_array($res9);
	$amt=$r9[6];
}else{
	$oid=$_REQUEST['oid'];
	$amt=$_REQUEST['oamt'];
}

?>
<script type="text/javascript">
function validation()
{
	if(form1.selcardtype.value=="0")
	{
		alert("Please Select Card Type");
		form1.selcardtype.focus();
		return false;
	}
	
	var v=/^[0-9]+$/;
	if(form1.txtcno.value=="")
	{
		alert("Please Enter 16 Digit Card No");
		form1.txtcno.focus();
		return false;
	}else if(form1.txtcno.value.length!=16){
		alert("Please Enter Your Card No 16 Digit Long");
		form1.txtcno.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtcno.value))
		{
			alert("Please Enter Only Digits in Your Card No");
			form1.txtcno.focus();
			return false;
		}
	}
	
	if(form1.txtcvvno.value=="")
	{
		alert("Please Enter 3 Digit CVV No");
		form1.txtcvvno.focus();
		return false;
	}else if(form1.txtcvvno.value.length!=3){
		alert("Please Enter Your CVV No 3 Digit Long");
		form1.txtcvvno.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtcvvno.value))
		{
			alert("Please Enter Only Digits in Your CVV No");
			form1.txtcvvno.focus();
			return false;
		}
	}
	
	var v=/^[a-zA-Z ]+$/
	if(form1.txtbname.value=="")
	{
		alert("Please Enter Bank Name");
		form1.txtbname.focus();
		return false;
	}else{
		if(!v.test(form1.txtbname.value))
		{
			alert("Please Enter Only Alphabets in Bank Name");
			form1.txtbname.focus();
			return false;
		}
	}
	
	if(form1.txtname.value=="")
	{
		alert("Please Enter Card Holder Name");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets in Card Holder Name");
			form1.txtname.focus();
			return false;
		}
	}
	

}
</script>
<?php
if(isset($_POST['btnpay']))
{
	$ctype=$_POST['selcardtype'];	
	$cno=$_POST['txtcno'];
	$cvvno=$_POST['txtcvvno'];
	
	$bname=$_POST['txtbname'];
	$cname=$_POST['txtname'];
	$exdate=$_POST['selexmonth']."-".$_POST['selexyear'];
	
	
	
	$res1=mysql_query("select max(pay_id) from payment");
	$payid=0;
	while($r1=mysql_fetch_array($res1))
	{
		$payid=$r1[0];
	}
	$payid++;
	if(isset($_REQUEST['bid']))
	{
		$query="insert into payment values('$payid','$bid','0','$ctype','$cno','$cvvno','$bname','$cname','$exdate','$amt')";
	}else{
		$query="insert into payment values('$payid','0','$oid','$ctype','$cno','$cvvno','$bname','$cname','$exdate','$amt')";
	}
	if(mysql_query($query))
	{
		if(isset($_REQUEST['bid']))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Payment Successfully');";
			echo "window.location.href='view_membership.php';";
			echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Payment Successfully');";
			echo "window.location.href='thank_you.php?oid=$oid&oamt=$amt';";
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
                        <h2>PAYMENT<em></em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>If you appreciate quality, then we are for you.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-6">
                <ul>
                  <li> <img src="assets/images/regis1.gif" style="width:550px; height:500px;"alt="First Class"></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <section class='tabs-content'>
                  <div class="contact-form">
                        <form  name="form1" method="post">
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
							
                                <select name="selcardtype">
									<option value="0">--Select Card Type--</option>
									<option value="DEBIT CARD">DEBIT CARD</option>
									<option value="CREDIT CARD">CREDIT CARD</option>
								</select>
                              </fieldset>
                            </div>
							<div class="col-lg-6">
                              <fieldset>
                                <input name="txtcno" type="text"  placeholder="Enter 16 Digit Card No" >
                              </fieldset>
                            </div>
							<div class="col-lg-6">
                              <fieldset>
                                <input name="txtcvvno" type="text"  placeholder="Enter 3 Digit CVV No" >
                              </fieldset>
                            </div>
							
							<div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="txtbname" type="text"  placeholder="Enter Bank Name" >
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="txtname" type="text" placeholder="Enter Card Holder Name" >
                              </fieldset>
                            </div>
							
							
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                               Select Expiry Month
                <select name="selexmonth" class="form-control">
					<option value="Jan">JAN</option>
					<option value="Feb">FEB</option>
					<option value="Mar">MAR</option>
					<option value="April">April</option>
					<option value="May">MAY</option>
					<option value="June">JUNE</option>
					<option value="July">JULY</option>
					<option value="Aug">AUG</option>
					<option value="Sep">SEP</option>
					<option value="Oct">OCT</option>
					<option value="Nov">NOV</option>
					<option value="Dec">DEC</option>
				</select>
                              </fieldset>
                            </div>
                           <div class="col-md-6 col-sm-12">
                              Select Expiry Year
				<select name="selexyear" class="form-control">
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
					<option value="2026">2026</option>
					<option value="2027">2027</option>
					<option value="2028">2028</option>
					<option value="2029">2029</option>
					<option value="2030">2030</option>
				</select>
                            </div>
							 
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" name="btnpay" onclick="return validation();" class="main-button">PAY Rs.<?php echo $amt; ?>/-</button>
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
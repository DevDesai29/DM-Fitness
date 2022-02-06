<?php
session_start();
include("header.php");
include("connect.php");

?>
<script type="text/javascript">
function validation()
{
	var v=/^[a-zA-Z ]+$/
	if(form1.txtname.value=="")
	{
		alert("Please Enter Your Name");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets in Your Name");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtadd.value=="")
	{
		alert("Please Enter Your Address");
		form1.txtadd.focus();
		return false;
	}
	
	if(form1.txtdesc.value=="")
	{
		alert("Please Enter Why You Want To Become a Gym Member");
		form1.txtdesc.focus();
		return false;
	}
	
	if(form1.txtcity.value=="")
	{
		alert("Please Enter Your City Name");
		form1.txtcity.focus();
		return false;
	}else{
		if(!v.test(form1.txtcity.value))
		{
			alert("Please Enter Only Alphabets in Your City Name");
			form1.txtcity.focus();
			return false;
		}
	}
	
	
	var v=/^[0-9]+$/;
	if(form1.txtmno.value=="")
	{
		alert("Please Enter Your Mobile No");
		form1.txtmno.focus();
		return false;
	}else if(form1.txtmno.value.length!=10){
		alert("Please Enter Your Mobile No 10 Digit Long");
		form1.txtmno.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtmno.value))
		{
			alert("Please Enter Only Digits in Your Mobile No");
			form1.txtmno.focus();
			return false;
		}
	}
	
	var v=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/;
	if(form1.txtemail.value=="")
	{
		alert("Please Enter Your Email ID");
		form1.txtemail.focus();
		return false;
	}else{
		if(!v.test(form1.txtemail.value))
		{
			alert("Please Enter Valid Email ID");
			form1.txtemail.focus();
			return false;
		}
	}
	
	if(form1.txtpwd.value=="")
	{
		alert("Please Enter Your Password");
		form1.txtpwd.focus();
		return false;
	}else if(form1.txtpwd.value.length<6){
		alert("Please Enter Your Password Greater than 6 characters");
		form1.txtpwd.focus();
		return false;
	}else if(form1.txtpwd.value.length>10){
		alert("Please Enter Your Password Less than 10 characters");
		form1.txtpwd.focus();
		return false;
	}
	
	if(form1.selheight.value=="0")
	{
		alert("Please Select Your Height");
		form1.selheight.focus();
		return false;
	}
	
	
	if(form1.selweight.value=="0")
	{
		alert("Please Select Your Weight");
		form1.selweight.focus();
		return false;
	}
	
	if(form1.gender[0].checked==false)
	{
		if(form1.gender[1].checked==false)
		{
			alert("Please Select Gender");
			return false;
		}
	}
	
}
</script>
<?php
if(isset($_POST['btnregis']))
{
	$name=$_POST['txtname'];	
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$gender=$_POST['gender'];
	$height=$_POST['selheight'];
	$weight=$_POST['selweight'];
	$desc=$_POST['txtdesc'];
	
	$res2=mysql_query("select * from cust_regis where email_id='$email'");
	if(mysql_num_rows($res2)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Email Id Already Exists');";
		echo "window.location.href='regis.php';";
		echo "</script>";
	}else{
		$res1=mysql_query("select max(cust_id) from cust_regis");
		$custid=0;
		while($r1=mysql_fetch_array($res1))
		{
			$custid=$r1[0];
		}
		$custid++;
		
		$query="insert into cust_regis values('$custid','$name','$add','$city','$mno','$email','$pwd','$gender','$height','$weight','$desc')";
		if(mysql_query($query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Customer Registraton Successfully');";
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
                        <h2>REGISTRATION<em> FORM</em></h2>
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
                                <input name="txtname" type="text"  placeholder="Enter Your Name" >
                              </fieldset>
                            </div>
							<div class="col-lg-6">
                              <fieldset>
                                <textarea name="txtadd" rows="3" placeholder="Enter Your Address" ></textarea>
                              </fieldset>
                            </div>
							<div class="col-lg-6">
                              <fieldset>
                                <textarea name="txtdesc" rows="3" placeholder="Why You Want To Become Member" ></textarea>
                              </fieldset>
                            </div>
							 <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="txtcity" type="text"  placeholder="Enter Your City" >
                              </fieldset>
                            </div>
							<div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="txtmno" type="text"  placeholder="Enter Your Mobile No" >
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="txtemail" type="text" placeholder="Enter Your Email" >
                              </fieldset>
                            </div>
							<div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="txtpwd" type="password" placeholder="********" >
                              </fieldset>
                            </div>
							
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <select name="selheight" >
									<option value="0">--Select Height--</option>
								<?php
								for($i=120;$i<=203;$i++)
								{
								?>
									<option value="<?php echo $i.'cm'; ?>"><?php echo $i; ?> cm</option>
								<?php
								}
								?>
								</select>
                              </fieldset>
                            </div>
                           <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <select name="selweight" >
									<option value="0">--Select Weight--</option>
								<?php
								for($i=30;$i<=200;$i++)
								{
								?>
									<option value="<?php echo $i.'KG'; ?>"><?php echo $i; ?> KG</option>
								<?php
								}
								?>
								</select>
                              </fieldset>
                            </div>
							 <div class="col-md-12 col-sm-12" style="padding-bottom:10px;">
                              <fieldset>
							  Select Gender
                                <input name="gender" type="radio"  value="MALE" > MALE
								<input name="gender" type="radio"  value="FEMALE" > FEMALE
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" name="btnregis" onclick="return validation();" class="main-button">REGISTER</button>
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
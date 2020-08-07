<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/buttons.css" rel="stylesheet">
</head>
<body>
   <div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
               Sign Up Here
            </h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="register.php" method="post" name="signup">
                  <div class="form-group">
                     <input type="text" name="fname"  class="form-control my-input" id="fname" placeholder="First name">
                  </div>
                  <div class="form-group">
                     <input type="text" name="lname"  class="form-control my-input" id="lname" placeholder="Last name">
                  </div>
                  <div class="form-group">
                  <select class="form-control" name="gender" id="gender" placeholder="Gender">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                </select>
                  </div>
                  <div class="form-group">
                     <input type="email" name="email"  class="form-control my-input" id="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <input type="text" name="username"  class="form-control my-input" id="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                     <input type="password" name="password"  class="form-control my-input" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                     <input type="password" name="cpassword"  class="form-control my-input" id="cpassword" placeholder="Confirm password">
                  </div>
                  <div class="text-center ">
                     <button type="submit" class=" btn btn-block send-button tx-tfm">Create Your Free Account</button>
                  </div>
                  <div class="col-md-12 ">
                     <div class="login-or">
                        <hr class="hr-or">
                        <span class="span-or">or</span>
                     </div>
                  </div>
                  <div class="form-group">
                     <a class="btn btn-block g-button" href="#">
                     <i class="fa fa-google"></i> Sign up with Google
                     </a>
                  </div>
                  <p class="small mt-3">By signing up, you are indicating that you have read and agree to the <a href="#" class="ps-hero__content__link">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                  </p>
               </form>
            </div>
         </div>
      </div>
   </div>
   <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
	$('#login').on('click', function() {
		$("#login_form").show();
		$("#register_form").hide();
	});
	$('#register').on('click', function() {
		$("#register_form").show();
		$("#login_form").hide();
	});
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var gender = $('#gender').val();
		var email = $('#email').val();
		var username = $('#username').val();
        var password = $('#password').val();
		if(name!="" && email!="" && phone!="" && password!="" ){
			$.ajax({
				url: "loginAndSignupLogic.php",
				type: "POST",
				data: {
					type: 1,
					fname: fname,
					lname: lname,
					gender: gender,
					email: email,
					username: username						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$('#register_form').find('input:text').val('');
						$("#success").show();
						$('#success').html('Registration successful !'); 						
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
						$('#error').html('Email ID already exists !');
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
	$('#butlogin').on('click', function() {
		var email = $('#email_log').val();
		var password = $('#password_log').val();
		if(email!="" && password!="" ){
			$.ajax({
				url: "loginAndSignupLogic.php",
				type: "POST",
				data: {
					type:2,
					email: email,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						location.href = "home.php";						
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
						$('#error').html('Invalid EmailId or Password !');
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
</body>
</html>    
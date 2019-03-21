
<?php  
	ob_start();
	session_start();
	include 'dashboard/db/db.php';
	include 'dashboard/config/config.php';

	if(isset($_SESSION['id'])){
		header("Location: dashboard");
 	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">

    <title>One Store | Log In</title>

    <!-- CSS -->
	<link href='//fonts.googleapis.com/css?family=Squada+One' rel='stylesheet' type='text/css'>
	<link href="assets/css/login.css" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="filter filter-color-red">
		<!-- login -->
		<div class="container login-section">	
			<div class="login-w3l">	
				<div class="login-form">	
					<h2 class="wthree">Sign In!</h2>	
					<form action="#" method="post" class="agile_form">
						<div class="w3ls-name1">
							<label class="header">USERNAME</label>
							<input placeholder="User Name " type="text" required name="username">
						</div>
						<div class="w3ls-name1">
							<label class="header">PASSWORD</label>	
							<input placeholder="*****" type="password" required name="password">
						</div>	
						<input type="submit" value="Log In" name="login">

						<a href="index.php" style="width: 40%;
								    margin: 0 auto;
								    margin-top: 50px;
								    cursor: pointer;
								    outline: none;
								    color: #fff;
								    display: block;
								    border-radius: 5px;
								    padding: 0.5em 0;
								    letter-spacing: 1px;
								    border: 2px solid rgba(189, 0, 0, 0.79);
								    background: rgba(189, 0, 0, 0.79);
								    text-align: center;
								    float: left;
    ">Back To Home</a>
						<a href="signup.php" style="width: 40%;
								    margin: 0 auto;
								    margin-top: 50px;
								    cursor: pointer;
								    outline: none;
								    color: #fff;
								    display: block;
								    border-radius: 5px;
								    padding: 0.5em 0;
								    letter-spacing: 1px;
								    border: 2px solid rgba(189, 0, 0, 0.79);
								    background: rgba(189, 0, 0, 0.79);
								    text-align: center;
								    float: right;
    ">Not Registered?</a>
						
					</form>
				</div>
			</div>	
			<div class="login-w3l-bg" style="color: #fff;">	

            	<div class="" style="width: 100%; background-color: red; text-align: center; padding: 21.8vh 10px; display: block; ">
            		<h1 style="font-size: 94px;"><i class="fa fa-bullseye" style="font-size: 82px;"></i>NE</h1>
            		<h2 style="font-size: 55px;">STORE</h2>
            	</div>

			</div>	 
			<div class="clearfix"></div>	
		</div> 	
	</div>
</body>
</html>

<?php 
	include 'dashboard/function/signin_script.php';
?>




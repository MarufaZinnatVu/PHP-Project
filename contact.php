<?php include 'template/head.php'; ?>
<?php include 'template/header2.php'; ?>

    <div class="clearfix"></div>

	<div class="jumbotron jumbotron-sm" style="margin-top: 0vh;">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-12 col-lg-12">
	                <h1 class="text-center">
	                    <small>Feel free to contact us</small></h1>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="container">
	    <div class="row">
	        <div class="col-md-8">
	            <div class="well well-sm">
	                <form action="" method="POST">
	                <div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label for="name">
	                                Name</label>
	                            <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter name" required="required" />
	                        </div>
	                        <div class="form-group">
	                            <label for="email">
	                                Email Address</label>
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
	                                </span>
	                                <input type="email" class="form-control" id="uemail" name="uemail" placeholder="Enter email" required="required" /></div>
	                        </div>
	                        <div class="form-group">
	                            <label for="subject">
	                                Subject</label>
	                            <select id="subject" name="subject" class="form-control" required="required">
	                                <option value="na" selected="">Choose One:</option>
	                                <option value="service">General Customer Service</option>
	                                <option value="suggestions">Suggestions</option>
	                                <option value="product">Product Support</option>
	                            </select>
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <label for="name">
	                                Message</label>
	                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
	                                placeholder="Message"></textarea>
	                        </div>
	                    </div>
	                    <div class="col-md-12">
	                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs" name="btnContactUs"> Send Message</button>
	                    </div>
	                </div>
	                </form>
	            </div>
	        </div>
	        <div class="col-md-4">
	            <form>
	            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
	            <address>
	                <strong>Varendra University</strong><br>
	                Rajshahi 6000<br>
	                <abbr title="Phone">
	                    P:</abbr>
	                (+880) 1710-101010
	            </address>
	            <address>
	                <strong>Full Name</strong><br>
	                <a href="mailto:#">first.last@example.com</a>
	            </address>
	            </form>
	        </div>
	    </div>
	</div>



    <div class="clearfix"></div>

<?php include 'template/footer.php'; ?>
<?php include 'template/foot.php'; ?>

<?php 
	if (isset($_POST['btnContactUs'])) {
		include 'dashboard/db/db.php';
		$name = $_POST['uname'];
		$email = $_POST['uemail'];
		$sub = $_POST['subject'];
		$msg = $_POST['message'];
		if (!empty($name) && !empty($email) && !empty($sub) && !empty($msg)) {
			$query = "INSERT INTO tbl_msg(name,email,subject,msg) 
									VALUES('$name','$email','$sub','$msg')";
			$result = mysqli_query($con,$query);
			if ($result) {
				echo "<script>alert('Massage Sent Successfully')</script>";
			}else{
				echo "<script>alert('Massage did not Sent')</script>";
			}
		}else{
			echo "<script>alert('Field Empty')</script>";
		}
	}
	
?>
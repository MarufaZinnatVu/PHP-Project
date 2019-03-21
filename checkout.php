<?php include 'template/head.php'; ?>
<?php include 'template/header2.php'; ?>

<div class="clearfix"></div>

<div style="height: 50px;"></div>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="panel-head">
				<h3>Check Out</h3>
			</div>
			<table class="table">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>X</th>
                </tr>

                <?php 
                    if (!empty($_SESSION['shopping_cart'])) {
                        $total = 0;

                        foreach ($_SESSION['shopping_cart'] as $key => $value) {
                            
                        
                    
                ?>

                <tr>
                    <td><?php echo $value['item_name'] ?></td>
                    <td><?php echo $value['item_price'] ?></td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td><?php echo number_format($value['quantity'] * $value['item_price'], 2) ?></td>

                    <td><a style="padding: 3px 7px;" href="product.php?action=delete&id=<?php echo $value['item_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>

                    <?php  
                        $total = $total + ($value['quantity'] * $value['item_price']);
                    ?>

                    <?php }} ?>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Grand Total:</td>
                    <td><?php 
                            if (!empty($_SESSION['shopping_cart'])) {
                                echo number_format($total,2);
                            }
                        ?>    
                    </td>
                    <td>TK</td>
                </tr>

                
            </table>

            <div class="row">
            	<div class="col-md-6">
            		<div class="panel panel-default text-center" style="padding: 15px;">
            			
							  <?php  
    	                           
                                   if (isset($_SESSION['id'])) {
                                        $id = $_SESSION['id'];
                                        $query = "SELECT * FROM tbl_users WHERE id = '$id'";
                                        $result = mysqli_query($con,$query);

                                        if ($result) {
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo '<h3>'.'Hello '.$row['fullname'].'</h3>';
                                            }
                                        }
                                    }else{
                                           
	                                    
	                                    
	                        ?>

                                <h2>Please <br> <a href="signin.php">Sign In</a> or <a href="signup.php">Register</a> <br> to <br>Purchese Product</h2>

                        <?php } ?>
						

            		</div>
            	</div>
                <?php  
                    if (isset($_SESSION['id'])) {
                ?>
                	<div class="col-md-6">
                		<div class="panel panel-default" style="padding: 15px;">
    						<form action="checkout.php" method="post">
    							

                				<div class="form-group">
    							    <label for="bk_number">BKASH Number</label>
    							    <input type="number" class="form-control" minlength="11" maxlength="11" id="bk_number" name="bkash_number" required>
    							</div>
                                <div class="form-group">
                                    <label for="transection_id">Transection ID</label>
                                    <input type="text" class="form-control" minlength="10" maxlength="10" id="transection_id" name="bkash_transection_id" required>
                                </div>
                                <div class="form-group">
                                    <label for="transection_id">Shipping Address</label>
                                    <textarea class="form-control" id="transection_id" name="shipping_address" required></textarea>
                                </div>
                			
                		</div>
                	</div>



            	<div style="text-align: center;">
            				<button class="btn btn-primary btn-lg" name="checkout" style="width: 50%;">SUBMIT</button>
            	</div>

                <?php }else{ ?>

                    

                <?php } ?>

            			</form>
            </div>
		</div>
	</div>
</div>   

<div class="clearfix"></div>

<?php include 'template/footer.php'; ?>
<?php include 'template/foot.php'; ?>


<?php
                                    
    if(isset($_POST["checkout"])) {

    	

        // echo $product_ids = implode(',', array_map(function($i) { return $i[0]; }, $_SESSION['shopping_cart']));

		foreach($_SESSION['shopping_cart'] as $u) 
		$uids[] = $u['item_id'];
		$product_ids = implode(",",$uids);

        $bkash_number           = mysqli_real_escape_string($con, $_POST['bkash_number']);
        $bkash_transection_id   = mysqli_real_escape_string($con, $_POST['bkash_transection_id']);
        $shipping_address       = mysqli_real_escape_string($con, $_POST['shipping_address']);

        $user_id                = $_SESSION['id'];

        $token                  =  rand(1001,9999);
        $token_no               =  substr($token, 1,6);


        if (!empty($bkash_number) || !empty($bkash_transection_id)) {
            $query = "INSERT INTO tbl_order(user_id,product_ids,amount,bkash_number,bkash_transection_id,shipping_address,token_no) VALUES('$user_id','$product_ids','$total','$bkash_number','$bkash_transection_id','$shipping_address','$token_no')";
            $result = mysqli_query($con,$query);
            if ($result) {
                echo "<script>alert('Transection Successfull')</script>";
                echo "<script>alert('Your Token Number id $token_no')</script>";
                unset($_SESSION['shopping_cart']);
                echo "<script>window.location.href='product.php'</script>";




            }else{
                echo "<script>alert('ERROR!!! While inserting Transection')</script>";
            }

        }else{
            echo "<script>alert('Field Must Not be Empty')</script>";
        }

                


    }
    
?>
<?php include 'template/head.php'; ?>
<?php include 'template/header2.php'; ?>



<?php  
    if (isset($_GET["action"]))
    {
        if ($_GET["action"] == "delete") 
        {
           
            foreach ($_SESSION['shopping_cart'] as $key => $value) 
            {
                if ($value['item_id'] == $_GET['id']) 
                {
                    unset($_SESSION['shopping_cart'][$key]);
                    echo "<script>alert('Item has been removed')</script>";
                    header("location: product.php");
                }
            }
        }
    }
?>




    <div class="clearfix"></div>

    <!-- Start Content -->
    <div class="section">
        <div class="container">
                
            <div class="row">


                <div class="col-md-12">
                    <h3 style="margin-bottom: 2vh;">Search Result For "<?php echo $_GET['keyword']; ?>"</h3>

                    <div class='row'>
                        <?php  

                            if (isset($_GET['keyword'])) 
                            {
                                $key_word = $_GET['keyword'];
                                $query = "SELECT * FROM tbl_products WHERE product_name LIKE '%$key_word%'";
                                $result = mysqli_query($con,$query);

                                if ($result) 
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $product_id         = $row['product_id'];
                                        $product_name       = $row['product_name'];

                                    
                                        $product_price      = $row['product_price'];
                                        $product_details    = $row['product_details'];
                                        $product_image      = $row['product_image'];

                                        $product_cat_id     = $row['product_cat_id'];
                                     
                        ?>


                        
                        <div class="col-md-3 text-center">
                            <div class='product--red'>
                            <div class='product_inner' style="height: 350px;">
                                <form action="product.php?action=add&id=<?php echo $product_id; ?>" method="POST">
                                    <img src="dashboard/uploads/<?php echo $product_image ?>" width='300'>
                                    <br><br><span class="" style="font-size: 20px;margin-bottom: 15px;"><?php echo $product_name; ?></span><br><br>
                                    <span class="" style="font-size: 20px;margin-bottom: 15px;"><?php echo "৳ ".$product_price ?></span><br><br>
                              
                                <div class="row" text-center>
                                  <div class="col-md-12 text-center">
                                    <a href="details.php?id=<?php echo $product_id; ?>" style="" class="" title="Product Details" style="width: 100%; text-align: center;">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Read More
                                    </a>
                                  </div>
                                </div>

                            </form>

                            </div>
                          </div>
                        </div>

                      <?php 
              		    }

              		}} ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- End Content -->

    <div class="clearfix"></div>

<?php include 'template/footer.php'; ?>
<?php include 'template/foot.php'; ?>

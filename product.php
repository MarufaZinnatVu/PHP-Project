<?php include 'template/head.php'; ?>
<?php include 'template/header2.php'; ?>






    <div class="clearfix"></div>

    <!-- Start Content -->
    <div class="section">
        <div class="container">
                
            <div class="row">

                <?php include 'template/sidenav.php'; ?>

                <div class="col-md-9">
                    <h3 style="margin-bottom: 2vh;">ALL PRODUCTS</h3><hr>

                    <div class='row'>
                        <?php  

                            $query = "SELECT * FROM tbl_products ORDER BY product_id DESC";
                            $result = mysqli_query($con,$query);

                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)){
                                    $product_id         = $row['product_id'];
                                    $product_name       = $row['product_name'];
                                    $product_price      = $row['product_price'];
                                    $product_details    = $row['product_details'];
                                    $product_image      = $row['product_image'];

                                    $product_cat_id     = $row['product_cat_id'];
                        ?>


                        
                        <div class="col-md-4 text-center">
                            <div class='product--red'>
                            <div class='product_inner' style="height: 400px;">
                                <form action="add_cart.php?action=add&id=<?php echo $product_id; ?>" method="POST">
                                    <img src="dashboard/uploads/<?php echo $product_image ?>" width='300'>
                                    <br><br>
                                    <span class="t" style="font-size: 20px;margin-bottom: 15px; height: 50px;" title="<?php echo $product_name ?>">
                                        <?php 
                                            if (strlen($product_name) >= 25) {
                                                echo substr($product_name, 0,25).'...';
                                            }else{
                                                echo $product_name;
                                            }
                                         ?>
                                            
                                        </span><br><br>
                                    <span class="" style="font-size: 20px;margin-bottom: 15px;"><?php echo "৳ ".$product_price ?></span><br><br>

                                    <input type="number" name="quantity" value="1" class="form-control">
                              
                                <div class="row">
                                  <div class="col-md-6">
                                    <a href="details.php?id=<?php echo $product_id; ?>" style="" class="pull-left" title="Product Details"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                  </div>
                                  
                                  <div class="col-md-6">
                                        <input type="text" hidden name="hidden_name" value="<?php echo $product_name; ?>">

                                        

                                        <input type="text" hidden name="hidden_price" value="<?php echo $product_price; ?>">

                                        <button name="add_to_cart" class="btn btn-default pull-right" style="margin-top: 15px;background-color: transparent;color: #fff;">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    
                                  </div>
                                </div>
                            </form>

                            </div>
                          </div>
                        </div>

                      <?php }} ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- End Content -->

    <div class="clearfix"></div>

<?php include 'template/footer.php'; ?>
<?php include 'template/foot.php'; ?>






<?php  
    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete") {
           
            foreach ($_SESSION['shopping_cart'] as $key => $value) {
                if ($value['item_id'] == $_GET['id']) {
                    $id = $_GET['id'];
                    unset($_SESSION['shopping_cart'][$key]);
                    echo "<script>alert('Item has been removed')</script>";
                    echo "<script>window.location.href='product.php?ref=product'</script>";
                    // header("location: product.php");
                }
            }
        }
    }
?>
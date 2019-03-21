<?php include 'template/head.php'; ?>
<?php include 'template/header2.php'; ?>

<?php  
    if (isset($_POST['add_to_cart'])) {
        
        if (isset($_SESSION['shopping_cart'])) {
            $item_array_id = array_column($_SESSION['shopping_cart'], "item_id");
            if (!in_array($_GET['id'], $item_array_id)) {
                $count = count($_SESSION['shopping_cart']);
                $item_array = array(
                        'item_id' => $_GET['id'], 
                        'item_name' => $_POST['hidden_name'], 
                        'item_price' => $_POST['hidden_price'],
                        'quantity' => $_POST['quantity']);
                $_SESSION['shopping_cart'][$count] = $item_array;
                echo "<script>alert('Product Added to Cart')</script>";
                echo "<script>window.location.href='product.php'</script>";
            }else{
                echo "<script>alert('Already Added')</script>";
                echo "<script>window.location.href='product.php'</script>";
            }
        }else{
            $item_array = array(
                        'item_id' => $_GET['id'], 
                        'item_name' => $_POST['hidden_name'], 
                        'item_price' => $_POST['hidden_price'],
                        'quantity' => $_POST['quantity']);
            $_SESSION['shopping_cart'][0] = $item_array;
        }

    }
?>



                <?php  
                    if (isset($_GET["action"])){
                        if ($_GET["action"] == "delete") {
                           
                            foreach ($_SESSION['shopping_cart'] as $key => $value) {
                                if ($value['item_id'] == $_GET['id']) {
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

                <?php include 'template/sidenav.php'; ?>

                            <?php  
                                
                                $cat_id = $_GET['id'];
                                $query  = "SELECT cat_name FROM tbl_category WHERE cat_id = '$cat_id'";
                                $result = mysqli_query($con,$query);
                                $row    = mysqli_fetch_assoc($result);
                            ?>

                <div class="col-md-9">
                    <h3 style="margin-bottom: 2vh;"><?php echo $row['cat_name'] ?></h3><hr>

                    <div class='row'>
                        <?php  

                            $cat_id = $_GET['id'];
                            $query = "SELECT * FROM tbl_products WHERE product_cat_id = '$cat_id' ORDER BY product_id DESC";
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
                            <div class='product_inner text-center' style="height: 350px;">
                                <form action="add_cart.php?action=add&id=<?php echo $product_id; ?>" method="POST">
                                    <img src="dashboard/uploads/<?php echo $product_image ?>" width='300'><br>
                                    <span class="" style="font-size: 20px;margin-bottom: 15px;" title="<?php echo $product_name ?>"><?php 
                                            if (strlen($product_name) >= 25) {
                                                echo substr($product_name, 0,25).'...';
                                            }else{
                                                echo $product_name;
                                            }
                                         ?></span><br><br>
                                    <span class="" style="font-size: 20px;margin-bottom: 15px;"><?php echo "৳ ".$product_price ?></span>

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

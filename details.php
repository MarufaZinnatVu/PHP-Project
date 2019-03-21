




<?php  
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['shopping_cart'])) {
            
        }else{
            $item_array = array(
                        'item_id'       => $_GET['id'], 
                        'item_name'     => $_POST['hidden_name'], 
                        'item_price'    => $_POST['hidden_price'], 
                        'item_quantity' => $_POST['quantity'],
                        );
        }
    }
?>

<?php include 'template/head.php'; ?>
<?php include 'template/header2.php'; ?>

    <div class="clearfix"></div>

    <!-- Start Content -->
    <div class="section">
        <div class="container">
                
            <div class="row">

                <?php include 'template/sidenav.php'; ?>

                <?php  

                    require("dashboard/db/db.php"); 

                    $get_product_id = $_GET['id'];
                    $query = "SELECT * FROM tbl_products WHERE product_id = '$get_product_id'";
                    $result = mysqli_query($con,$query);

                    if ($result) {
                        while($row = mysqli_fetch_assoc($result)){
                            $product_id         = $row['product_id'];
                            $product_name       = $row['product_name'];
                            $product_price      = $row['product_price'];
                            $product_details    = $row['product_details'];
                            $product_image      = $row['product_image'];

                            $product_cat_id     = $row['product_cat_id'];
                        }
                    }
                ?>

                <div class="col-lg-9">
                  <div class="panel panel-default">
                    <div style="text-align: center;background:linear-gradient(180deg, rgba(189, 0, 0, 0.79) 0%, rgba(57, 0, 0, 1) 114%);
    ">
                        <img class="card-img-top img-fluid" style="height: 300px;" src="dashboard/uploads/<?php echo $product_image ?>">
                    </div>
                        
                    <div class="panel-body">
                      <h3 class="card-title"><?php echo $product_name ?></h3>
                      <h4><?php echo '৳ '.$product_price ?></h4>
                      <hr>
                      <p class="card-text"><?php echo $product_details ?></p>
                      <hr>

                        <form action="add_cart_details.php?action=add&id=<?php echo $product_id; ?>" method="POST">

                            <input type="number" name="quantity" value="1" class="form-control">

                            <input type="text" hidden name="hidden_name" value="<?php echo $product_name; ?>">

                            <input type="text" hidden name="hidden_price" value="<?php echo $product_price; ?>">

                            <button name="add_to_cart" class="btn btn-danger btn-lg pull-right" style="margin-top: 15px;">
                                            <i class="fa fa-shopping-cart"></i> Add To Cart
                                        </button>
                        </form>


                      
                    </div>
                  </div>
                  <!-- /.card -->

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
                    echo "<script>window.location.href='details.php?id=$id'</script>";
                    // header("location: product.php");
                }
            }
        }
    }
?>
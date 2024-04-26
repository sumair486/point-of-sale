<?php include("include/header.php") ?>
<div class="page-content">
  <!--breadcrumb-->
  <div class="row">
    <div class="col-md-12">
      <h3 class="ps-4">Add Products</h3>
    </div>
  </div>
  <div class="page-content container-fluid">
    <!--  Start Row  -->

    <div class="card">
      <div class="card-body my-only-div-shadow">
        <!-- <h3>Add Product</h3> -->
        <br>
        <form method="POST" enctype='multipart/form-data'>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" required>
                </div>
              </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label>Article No</label>
                  <input type="text" class="form-control" placeholder="Enter Article No" name="product_code" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2" name="category_id" required>
                    <option value="">Select category</option>
                    <?php
                    $query = "SELECT category,id FROM categories";
                    $run_check = mysqli_query($connection, $query);
                    while ($Data = mysqli_fetch_array($run_check)) {
                      $id = $Data['id'];
                      $category  = $Data['category'];
                    ?>
                      <option value="<?php echo $id; ?>"><?php echo $category; ?>
                      </option>
                    <?php } ?>

                  </select>
                </div>
              </div>
             <!--  <div class="col-md-6">
                            <div class="form-group">
                              <label>Ware House</label>
                              <select class="form-control select2" name="ware_houose_id" id="ware_house_id1">
                                <option value="">Choose</option>
                                <?php
                                $query1 = "SELECT warehouse,id FROM ware_house";
                                $run_check1 = mysqli_query($connection, $query1);
                                while ($Data1 = mysqli_fetch_array($run_check1)) {
                                  $warehouse_id = $Data1['id'];
                                  $warehouse_name  = $Data1['warehouse'];
                                ?>
                                  <option value="<?php echo $warehouse_id; ?>"><?php echo $warehouse_name; ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </div>
                          </div> -->
<!--               <div class="col-md-6 mt-2">
                <div class="form-group">
                  <label>Product Unit</label>
                  <select class="form-control select2" name="product_unit_id">
                    <option value="">Choose</option>
                    <?php
                    $query = "SELECT unit,id FROM units";
                    $run_check = mysqli_query($connection, $query);
                    while ($Data = mysqli_fetch_array($run_check)) {
                      $id = $Data['id'];
                      $unit  = $Data['unit'];
                    ?>
                      <option value="<?php echo $id; ?>"><?php echo $unit; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 mt-2">
                <div class="form-group">
                  <label>Product Purchase Unit</label>
                  <select class="form-control select2" name="purchase_unit">
                    <option value="">Choose</option>
                    <?php
                    $query = "SELECT unit,id FROM units";
                    $run_check = mysqli_query($connection, $query);
                    while ($Data = mysqli_fetch_array($run_check)) {
                      $id = $Data['id'];
                      $unit  = $Data['unit'];
                    ?>
                      <option value="<?php echo $id; ?>"><?php echo $unit; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6 mt-2">
                <div class="form-group">
                  <label>Product Sale Unit</label>
                  <select class="form-control select2" name="sale_unit">
                    <option value="">Choose</option>
                    <?php
                    $query = "SELECT unit,id FROM units";
                    $run_check = mysqli_query($connection, $query);
                    while ($Data = mysqli_fetch_array($run_check)) {
                      $id = $Data['id'];
                      $unit  = $Data['unit'];
                    ?>
                      <option value="<?php echo $id; ?>"><?php echo $unit; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div> -->
              <div class="col-md-6 mt-2">
                <div class="form-group">
                  <label>Alert Quantity</label>
                  <input type="text" class="form-control" placeholder="Alert Quantity" name="alert_quality">
                </div>
              </div>
              <div class="col-md-6 mt-2">
                <div class="form-group">
                  <label>Open stock Quantity</label>
                  <input type="number" class="form-control" placeholder="Open stock Quantity" name="open_stock_quantity">
                </div>
              </div>
              <div class="col-md-6 mt-2">
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" placeholder="Description" name="Description"></textarea>
                </div>
              </div>
              <div class="col-md-4">
                      <div class="form-group">
                        <label>Image</label>
                        <input id="file1" type="file" name="image" onchange="showImage1(event)" t accept="image/*" class="form-control" style="overflow: hidden;">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group mr-3 mt-3">
                        <img id="log1" class="shadow" style="border: 1px blue solid; border-radius: 10%; margin-top: -4%" width="120px;" height="130px" src="../../images/product.png" alt="">
                      </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" name="saveData" class="btn btn-primary shadow" value="Save">
            <button type="button" class="btn btn-danger shadow" data-bs-dismiss="modal">Close</button>
          </div>
        </form>


      </div>
    </div>
    <!-- End Row  -->
  </div>
  <?php include("include/footer.php"); 
  if (isset($_POST['saveData'])) {
    $pro_name =  $_POST['product_name'];
    $cat_id = $_POST['category_id'];
    $product_code   = $_POST['product_code'];
    $open_stock_quantity = $_POST['open_stock_quantity'];
    $alert_quantity = $_POST['alert_quality'];
    $Description = $_POST['Description'];
    $profImage = $_FILES['image']['name'];
    $temp_profImage  = $_FILES['image']['tmp_name'];
    $pathImg1U    = "../../images/product_image/" . $profImage;
      move_uploaded_file($temp_profImage, $pathImg1U);
    $to_date = date('y-m-d');
    
    $check = "SELECT * FROM products WHERE  product_code = '$product_code'";
    $run_check = mysqli_query($connection, $check);
    $countRow = mysqli_num_rows($run_check);
    if ($countRow == 0) {
      $insert = "INSERT INTO products(product_name,product_code ,category_id,alert_quantity,open_stock_quantity,Description,product_image) 

      VALUES ('$pro_name','$product_code','$cat_id','$alert_quantity','$open_stock_quantity','$Description','$profImage')";

      $run = mysqli_query($connection, $insert);
      $last_Product = mysqli_insert_id($connection);

      // $last_id_in_table1 = LAST_INSERT_ID();

     $update_query1 = "INSERT INTO `stock_items`(`product_id`, `purchase_item_id`, `warehouse_id`,`product_code`,`quantity`, `purchase_price`, `sale_price`, `stock_date`)

       VALUES (LAST_INSERT_ID(),'0','0','$product_code','$open_stock_quantity','0','0','$to_date')";
        $update_run = mysqli_query($connection, $update_query1);


    }
    if (@$update_run) {
      //  $insertStock = "INSERT INTO `stock_items`( `product_id`,`warehouse_id`, `quantity`, `stock_date`) VALUES ('$last_Product','0','0','$to_date')";

      // $runStock = mysqli_query($connection, $insertStock);
      echo " <!DOCTYPE html>
                      <html>
                        <body>
                          <script>
                          Swal.fire(
                          'Added!',
                          'Product has been successfully added!',
                          'success'
                          ).then((result) => {
                          if (result.isConfirmed) {
                          window.location.href = 'add_product.php';
                          }
                          });
                          </script>
                        </body>
                      </html>";
    } else {
      echo "<!DOCTYPE html>
                              <html>
                              <body>
                                <script>
                                Swal.fire(
                                'Error !',
                                'Product not add, Some error occure',
                                'error'
                                ).then((result) => {
                                if (result.isConfirmed) {
                                window.location.href = 'add_product.php';
                                }
                                });
                                </script>
                              </body>
                              </html>";
    }
  }
  ?>
  <script type="text/javascript">
     var showImage1 = function(event) {
  var uploadField = document.getElementById("file1");
  if (uploadField.files[0].size > 5000000000) {
  uploadField.value = "";
  Swal.fire(
  'Error !',
  'File Size is too big! Upload logo under 500kB !',
  'error'
  ).then((result) => {
  if (result.isConfirmed) {}
  });
  } else {
  var logoId = document.getElementById('log1');
  logoId.src = URL.createObjectURL(event.target.files[0]);
  }
  }
</script>
<?php include("include/header.php");
// code...
$pur_item_id = $_GET['pur_item_id'];
$fetchData = "SELECT p.id AS pur_id, p.purchase_date,pro.product_name, pi.purchase_price, pi.quantity, pi.purchase_total FROM purchase_items AS pi
INNER JOIN purchase AS p ON p.id = pi.purchase_id
INNER JOIN products AS pro ON pro.id = pi.product_id WHERE pi.id = '$pur_item_id' ORDER BY pi.id DESC";
$runData = mysqli_query($connection, $fetchData);
$rowData = mysqli_fetch_array($runData);
$pur_id   = $rowData['pur_id'];
$purchase_date   = $rowData['purchase_date'];
$product_name   = $rowData['product_name'];
$purchase_price   = $rowData['purchase_price'];
// $sale_price   = $rowData['sale_price'];
$quantity   = $rowData['quantity'];
$purchase_total   = $rowData['purchase_total'];

?>
<div class="page-content">
  <!--breadcrumb-->
  <div class="row mb-2">
    <div class="col-md-12">
      <h3>Edit Purchase Item</h3>
    </div>
  </div>
  <div class="page-content container-fluid">
    <!--  Start Row  -->
    <div class="row">
      <div class="col-md-12">
        <div class="card my-only-div-shadow">
          <div class="card-body">
            <br>
            <form method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="hidden" name="old_purchase_price" value="<?php echo $purchase_price; ?>" class="form-control">
                <!-- <input type="hidden" name="old_sale_price" value="<?php echo $sale_price; ?>" class="form-control"> -->
                <input type="hidden" name="old_quantity" value="<?php echo $quantity; ?>" class="form-control">
                <input type="hidden" name="old_purchase_total" value="<?php echo $purchase_total; ?>" class="form-control">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" class="form-control" value="<?php echo $purchase_date ?>" name="purchase_date" disabled>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Products</label>
                      <input name="product" class="form-control" value="<?php echo $product_name; ?>" required readonly>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group ">
                      <label>Purchase Price</label>
                      <input type="number" step="any" name="purchase_price" id="purchase_price_Id1" value="<?php echo $purchase_price; ?>" class="form-control" placeholder="Purchase Price" required onkeyup="Purchase_Price(1)">
                    </div>
                  </div>
                  <!-- <div class="col-md-3">
                    <div class="form-group ">
                      <label>Sale Price</label>
                      <input type="number" step="any" name="sale_price" class="form-control" placeholder="Sale Price" value="<?php echo $sale_price; ?>" required>
                    </div>
                  </div> -->
                  <div class="col-md-2">
                    <div class="form-group ">
                      <label>Quantity</label>
                      <input type="number" step="any" name="quantity" class="form-control" placeholder="Quantity" id="quantity1" value="<?php echo $quantity ?>" required onkeyup="Purchase_Price(1)">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group ">
                      <label>Purchase Total</label>
                      <input type="number" step="any" name="purchase_total" value="<?php echo $purchase_total; ?>" class="form-control" placeholder="Purchase Total" id="Purchase_Total_Id1" readonly>
                    </div>
                  </div>
                </div>
                <hr>
                <center>
                  <input type="submit" name="saveData" class="btn btn-primary shadow" value="Update">
                </center>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST['saveData'])) {
  $new_purchase_price = $_POST['purchase_price'];
  // $new_sale_price = $_POST['sale_price'];
  $new_quantity = $_POST['quantity'];
  $new_purchase_total = $_POST['purchase_total'];
  $old_purchase_price = $_POST['old_purchase_price'];
  // $old_sale_price = $_POST['old_sale_price'];
  $old_quantity = $_POST['old_quantity'];
  $old_purchase_total = $_POST['old_purchase_total'];
  $query = "UPDATE `purchase_items` SET `purchase_price`='$new_purchase_price',`quantity`='$new_quantity',`purchase_total`='$new_purchase_total' WHERE id='$pur_item_id'";
  $run = mysqli_query($connection, $query);
  if ($run) {
    if ($old_quantity > $new_quantity and $new_purchase_price > $old_purchase_price ) {
      $final_quantity = $old_quantity - $new_quantity;
      $final_purchase_price = $old_purchase_price - $new_purchase_price;
      $query1 = "UPDATE stock_items SET quantity= quantity - '$final_quantity' , purchase_price= purchase_price - '$final_purchase_price' WHERE purchase_item_id ='$pur_item_id'";
      $run1 = mysqli_query($connection, $query1);
    } else {
      $final_quantity = $new_quantity - $old_quantity;
      $final_purchase_price = $new_purchase_price - $old_purchase_price;
      // $final_sale_price = $new_sale_price - $old_sale_price;
      $update3 = "UPDATE stock_items SET quantity = quantity + $final_quantity , purchase_price = purchase_price + $final_purchase_price WHERE purchase_item_id = '$pur_item_id'";
      $runUpd3 = mysqli_query($connection, $update3);
    }
    $fetch4 = "SELECT purchase_id,purchase_total FROM purchase_items WHERE id = '$pur_item_id'";
    $runFetch4 = mysqli_query($connection, $fetch4);
    $row4 = mysqli_fetch_array($runFetch4);
    $purcha_Id = $row4['purchase_id'];
    $purchase_total = $row4['purchase_total'];
  }

  if ($old_purchase_total > $purchase_total) {

    $final_purchase_total = $old_purchase_total - $purchase_total;
    $sql3  = "UPDATE purchase SET after_discount_purchase = after_discount_purchase - $final_purchase_total WHERE id = '$purcha_Id'";
    $run3 = mysqli_query($connection, $sql3);


    $fetch3 = "SELECT after_discount_purchase FROM purchase WHERE id = '$purcha_Id'";
    $runFetch3 = mysqli_query($connection, $fetch3);
    $row3 = mysqli_fetch_array($runFetch3);
    $after_discount_purchase = $row3['after_discount_purchase'];

    $sql5  = "UPDATE supplier_ledger SET credit = $after_discount_purchase WHERE purchase_id = '$purcha_Id'";
    $run5 = mysqli_query($connection, $sql5);
  } else {
    $final_purchase_total =  $old_purchase_total - $purchase_total;
    $sql3  = "UPDATE purchase SET after_discount_purchase = after_discount_purchase - $final_purchase_total WHERE id = '$purcha_Id'";
    $run3 = mysqli_query($connection, $sql3);

    $fetch4 = "SELECT after_discount_purchase FROM purchase WHERE id = '$purcha_Id'";
    $runFetch4 = mysqli_query($connection, $fetch4);
    $row4 = mysqli_fetch_array($runFetch4);
    $after_discount_purchase = $row4['after_discount_purchase'];
    $sql6  = "UPDATE supplier_ledger SET credit = $after_discount_purchase WHERE purchase_id = '$purcha_Id'";
    $run6 = mysqli_query($connection, $sql6);
  }


  echo "<!DOCTYPE html>
      <html>
      <body>
        <script>
        Swal.fire(
        'Updated!',
        'Purchase Item has been successfully Updated!',
        'success'
        ).then((result) => {
        if (result.isConfirmed) {
        window.location.href = 'purchase_items_detail.php?id=$pur_id';
        }
        });
        </script>
      </body>
      </html>";
}


?>
<?php include("include/footer.php") ?>
<script type="text/javascript">
  function Purchase_Price(id) {
    var purchase_price_Id = $('#purchase_price_Id' + id).val();
    var quantity = $('#quantity' + id).val();
    $('#Purchase_Total_Id' + id).val((quantity * purchase_price_Id).toFixed(2));
  }
</script>
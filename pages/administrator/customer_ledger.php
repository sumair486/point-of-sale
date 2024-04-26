<?php
include "include/header.php";
?>
<br>
<section class="content">
  <div class="container-fluid">
    <h4 class="text-center">Customer Ledger</h4><br>
    <div class="row my-only-div-shadow py-4">
      <div class="col-md-4">
        <div class="form-group">
          <label>Customer/Contact</label>
          <select class="form-control select2" id="cust_id" onchange="getDetails()" name="customer_id" required>
            <option value="">Choose</option>
            <?php
            $fetchData1 = "SELECT * FROM customer ORDER BY name ASC";
            $runData1 = mysqli_query($connection, $fetchData1);
            while ($rowData1 = mysqli_fetch_array($runData1)) {

              $id         = $rowData1['id'];
              $name       = $rowData1['name'];
              $mobile   = $rowData1['mobile'];
              echo "<option value='$id'>$name / $mobile</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Date From</label>
          <input type="date" id="from_date" class="form-control" value="<?php echo date('Y-m-d', strtotime('-1 year')); ?>" onchange="getDetails()">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Date To</label>
          <input type="date" id="to_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" onchange="getDetails()">
        </div>
      </div>
    </div>

    <hr class="shadow">

    <div class="row">
      <div class="col-md-12 table-responsive" id="ajaxData">
      </div>
    </div>

  </div>
</section>
<?php include "include/footer.php"; ?>

<script type="text/javascript">
  function getDetails() {
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    var cust_id = $('#cust_id').val();

    $("#preloader").fadeIn(100);

    $.ajax({
      url: 'customer_ledger_ajax.php',
      type: 'post',
      data: {
        'from_date': from_date,
        'to_date': to_date,
        'cust_id': cust_id
      },
      dataType: "html",
      success: function(result) {
        $("#ajaxData").html(result);
      }
    }).done(function() {
      $(".datatable").DataTable();
      $("#preloader").fadeOut(100);
    });
  }
</script>
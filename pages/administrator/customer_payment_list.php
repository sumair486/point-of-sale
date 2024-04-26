<?php
include "include/header.php";
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-md-6">
        <h4 class="m-0 text-dark">Customer Payment Details</h4>
      </div>
      <div class="col-md-6">
        <ol class="breadcrumb float-md-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Customer Payment Details</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<section class="content" >
  <div class="container-fluid" class="text-center">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general Card elements -->
        <div class="card card-dark" class="text-center">
          <div class="card-header">
            <div class="card-title">Payment Details</div>
            <div class="card-tools">
              <a href="customer_payment.php" class="btn btn-primary btn-sm shadow">New Payment</a>
            </div>
          </div>
          <br>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <!-- Table start -->
            <table class="table table-striped table-bordered datatable text-center" style="font-size: 12px" data-page-length="25">
              <thead class="bg-dark">
                <tr>
                  <th>S.No</th>
                  <th>Customer Type</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Total Amount</th>
                  <th>Total Paid</th>
                  <th>Remaining</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count = 0;
                $fetchData= "SELECT SUM(CASE WHEN c_p.payment_type != '2' THEN c_p.paid ELSE NULL END) AS totalPaid, SUM(CASE WHEN c_p.payment_type = '2' THEN c_p.paid ELSE NULL END) AS reverseP, c.id, c.name, c.type, c.address, c.mobile, c.email FROM customer_payment AS c_p LEFT JOIN customer AS c ON c.id = c_p.customer_id GROUP BY c_p.customer_id ORDER BY c_p.id DESC";
                $runData = mysqli_query($connection,$fetchData);
                while($rowData = mysqli_fetch_array($runData)) {
                $count++;
                $id         = $rowData['id'];
                $nameU   = $rowData['name'];
                $type   = $rowData['type'];
                $address   = $rowData['address'];
                $mobile   = $rowData['mobile'];
                $email    = $rowData['email'];
                if($rowData['totalPaid'] == '')
                {
                  $totalPaidU    = 0;
                }
                else
                {
                  $totalPaidU    = $rowData['totalPaid'];
                }
                if($rowData['reverseP'] == '')
                {
                  $reversePU    = 0;
                }
                else
                {
                  $reversePU    = $rowData['reverseP'];
                }
                $total_paidU    = $totalPaidU - $reversePU;

                $fetchData2= "SELECT SUM(total_amount) AS total FROM sale WHERE customer_id = '$id'";
                $runData2 = mysqli_query($connection,$fetchData2);
                $rowData2 = mysqli_fetch_array($runData2);

                if($rowData2['total'] == '')
                {
                  $total   = 0;
                }
                else
                {
                  $total   = $rowData2['total'];
                }
                $remain = $total - $total_paidU;
                
                ?>
                <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $type ?></td>
                  <td><?php echo $nameU ?></td>
                  <td><?php echo $mobile ?></td>
                  <td><?php echo $email ?></td>
                  <td><?php echo $address ?></td>
                  <td><?php echo $total ?></td>
                  <td><a href="customer_payment_history.php?id=<?php echo $id ?>"><b><?php echo $total_paidU ?></b></a></td>
                  <td><?php echo $remain ?></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
<?php include "include/footer.php"; ?>
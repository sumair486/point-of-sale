<?php

include "include/db.php";

if(isset($_POST['cust_id']))
{
  $cust_id = $_POST['cust_id'];
  $from_date = $_POST['from_date'];
  $to_date = $_POST['to_date'];

  $queryR = "SELECT SUM(debit) AS dr, SUM(credit) AS cr FROM customer_ledger WHERE customer_id = '$cust_id' AND Ldate BETWEEN '$from_date' AND '$to_date' ORDER BY Ldate, id";
  $resultR = mysqli_query($connection,$queryR);
  $rowDataR = mysqli_fetch_array($resultR);
  $DR  = $rowDataR['dr'];
  $CR   = $rowDataR['cr'];
?>
  <h4 class="text-right text-secondary">Current Balance : <?php echo number_format($DR-$CR,2); ?></h4>
 <div class="table-responsive">
      <table class="table table-bordered text-center datatable table-striped"  data-page-length="10000000" id="export_table">
    <thead class="my-table-style text-white printcolor">
      <tr>
        <th>S.No</th>
        <th width="12%">Date</th>
        <th width="38%">Description</th>
        <th width="15%">DR.</th>
        <th width="15%">CR.</th>
        <th width="15%">Balance</th>
      </tr>
    </thead>
    <tbody class="table-font-size">
    <?php
      $count=0;
      $totalCR=0;
      $totalDR=0;

      $query = "SELECT * FROM customer_ledger WHERE customer_id = '$cust_id' AND Ldate BETWEEN '$from_date' AND '$to_date' ORDER BY Ldate, id";
      $result = mysqli_query($connection,$query);
      while($rowData = mysqli_fetch_array($result))
      {
        $count++;
        $Ldate   = date("d-m-Y",strtotime($rowData['Ldate']));
        $sale_id   = $rowData['sale_id'];
        $debit   = $rowData['debit'];
        $credit   = $rowData['credit'];
        $totalDR += $debit;
        $totalCR += $credit;
        $balance   = $totalDR-$totalCR;

        $details   = $rowData['details'];
        if($debit == 0)
        {
          $debit = '';
        }
        else
        {
          $debit = number_format($debit,2);
        }
        if($credit == 0)
        {
          $credit = '';
        }
        else
        {
          $credit = number_format($credit,2);
        }
      ?>
      <tr class="my-table-row-hover">
        <td class="pt-2"><?php echo $count; ?></td>
        <td class="pt-2"><?php echo $Ldate; ?></td>
        <td class="pt-2"><?php echo $details; ?></td>
        <th class="text-danger pt-2"><?php echo $debit; ?></th>
        <th class="text-success pt-2"><?php echo $credit; ?></th>
        <th class="text-primary pt-2"><?php echo number_format($balance,2); ?></th>
      </tr>
      <?php } ?>
    </tbody>
  </table>
 </div>
  <br>
<?php } ?>
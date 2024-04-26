  <?php include('include/db.php');
if ( isset($_POST['productId'])) {
  $from = $_POST['sale_from'];
  $to   = $_POST['sale_to'];
  $productId   = $_POST['productId'];
?>
  <div class="table-responsive my-only-div-shadow py-4">
    <table class="table table-bordered data_table table-striped" id="export_table" data-page-length="100000000">
      <thead class="my-table-style text-white">
        <tr>
          <th>S.No</th>
                  <th>Product</th>
                  <th>Opening Stock Quantity </th>
                  <th>Current Sale Quantity </th>
                  <th>Closing Stock Quantity </th>
                  <th>Purchase Price </th>
                  <th>Sale Price </th>
         <!--  <th>Date</th> -->
        </tr>
      </thead>
      <tbody class="table-font-size">
<!-- SELECT p.product_name AS pro_name,(SUM(s.quantity)) as totalquantity ,s.stock_date,SUM(s.sale_price*s.quantity) AS saleprice,SUM(s.purchase_price*s.quantity) AS purchaseprice FROM stock_items AS s INNER JOIN products AS p ON p.id = s.product_id WHERE s.stock_date BETWEEN '$from' AND '$to' AND (s.product_id = '$productId' OR '$productId' = 'all') GROUP BY s.product_id ORDER BY p.product_name ASC -->

        <?php
        $serial  = 0;
 

    $new ="SELECT p.product_name AS product_name,(SUM(pi.quantity)) as opening_stock,(SUM(s.quantity)) as current_stock,((SUM(pi.quantity))-(SUM(s.quantity))) as closing_stock,SUM(s.sale_price*s.quantity) AS sale_price,SUM(s.purchase_price*s.quantity) AS purchase_price FROM stock_items AS s INNER JOIN purchase_items AS pi ON pi.id = s.purchase_item_id INNER JOIN products AS p ON p.id = s.product_id WHERE s.stock_date BETWEEN '$from' AND '$to' AND (s.product_id = '$productId' OR '$productId' = 'all') group BY s.product_id ORDER by p.product_name ASC";

   $query = mysqli_query($connection,$new);
        while ($row = mysqli_fetch_array($query)) {
          // $rec_date = $row['stock_date'];
          $saleprice = $row['sale_price'];
           $purchaseprice = $row['purchase_price'];
        
         
          $serial++;
        ?>
          <tr class="my-table-row-hover">
            <td class="pt-2"><?php echo $serial; ?></td>
            <td class="pt-2"><?php echo $row['product_name']; ?></td>
            <td class=" quantity pt-2"><?php echo $row['opening_stock']; ?></td>
           <td class="total pt-2"><?php echo $row['closing_stock']; ?></td>  
           <td class="openprice pt-2"><?php echo $row['current_stock']; ?></td>

            <td class=" purchaseprice pt-2"><?php echo  $purchaseprice; ?></td>
            <td class=" saleprice pt-2"><?php echo  $saleprice ; ?></td>
           <!--  <td class="pt-2"><?php echo $rec_date; ?></td> -->
          </tr>
        <?php } ?>
      </tbody>


      <tfoot>
        <tr style="background: grey; color: white">
          <b>
            <td colspan="" class="pt-2">Sum of Total</td>
             <td class=" pt-2"></td>
            <td class=" sumQuantity pt-2"></td>
            <td colspan="" class="sumTotal pt-2"></td>
            <td class="sumopenprice pt-2"></td>
            
            <td colspan="1" class=" sumpurchaseprice pt-2"></td>
            <td class=" sumsaleprice pt-2"></td>
         <!--    <td colspan="1" class=" pt-2">-</td> -->
          </b>
        </tr>
      </tfoot>

    </table>
  </div>
<?php }
// Date wise sale

?>
 <script type="text/javascript">
       $('#export_table').dataTable({
               
                dom: 'Bfrtip',

                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Stock_report Excel',
                        text:'Export to excel',
                        footer:true

                       //  Columns to export
                       //  exportOptions: {
                       //     columns: [0, 1, 2, 3,4,5,6,7]
                       // }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Stock_report PDF',
                        text: 'Export to PDF',
                        number: 'Export to PDF',
                        footer:true
                       
                       //  Columns to export
                       //  exportOptions: {
                       //     columns: [0, 1, 2, 3, 4, 5, 6,7]
                       // }

                    }



                ]

            });
                    
                    

    </script>
<?php
include 'include/db.php';
?>  
<style >
 
table {
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
}
td ,th {
  padding-left:6px !important;
}
@media print
{
.top2{
  margin-top: -10px;
}

#mid{min-height:1080px;} 
#bot{ min-height: 50px;}
#logo{
  text-align: center!important;
}
}
</style>
<?php

  $id = $_GET['id'];
  $discount = $_GET['discount'];
  $paid = $_GET['paid'];
  $remain_amount = $_GET['remain_amount'];


$select = "SELECT c.name,c.address,c.mobile,c.email,s.after_discount,s.id FROM  sale AS s
INNER JOIN customer AS c ON c.id = s.customer_id
WHERE s.id = '$id'";
  $run = mysqli_query($connection,$select);
  $row = mysqli_fetch_array($run);

  $after_discount = $row['after_discount'];
  $name = $row['name'];
  $address = $row['address'];
  $mobile = $row['mobile'];
  $id = $row['id'];
?>


  <div class="top2">
       <br>   <br>  

    <h3 style="text-align: center; font-size: 29px;">New Japan<br><span style="font-size: 22px;">Battery Center</span></h3>
     </div>
        <div style="margin-top: 10px; text-align: center;">
          <span><b>Invoice &nbsp; : &nbsp;</b></span>
    <span><b><?php echo $id ?></b></span>
    <br>
        <span>Contact:&nbsp;&nbsp;&nbsp;&nbsp;0335 5700042</span>
        <br>
        <span>Address:&nbsp;&nbsp;&nbsp;Tambwano Morr Mukaram Khan Plaza<br>Tehkal Payan, University Road Peshawar</span>
      </div>
        <br><!--End Info-->

    <div style="margin-bottom: 10px; text-align: center;">
    <span>Name&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $name ?></span>
    <br>
    <span>Date&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo date('d-m-Y',strtotime(date('Y-m-d'))) ?></span>
    
  </div>
 
    <div>



       <!-- deal item list -->

                  <center id="span"><b>Item List</b></center>
                      <center>
            <table  border="1px solid grey" width="37%" id="mytable">

              <thead>
              <tr align="left">
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
              </tr>
              </thead>
              <tbody>
                <!-- ------------------------fetch data from item list ------------------->
                <?php
                    $select1 = "SELECT si.price,si.quantity,si.total_price,p.product_name FROM `sale_items` AS si
                        INNER JOIN products AS p ON p.id = si.product_id
                        WHERE si.sale_id = '$id'";
                    $run1 = mysqli_query($connection,$select1);
                    while ($row1 = mysqli_fetch_array($run1)) {
                                       
                      $product_name = $row1['product_name'];
                      $quantity = $row1['quantity'];
                      $price  = $row1['price'];
                      $total_price  = $row1['total_price'];
                  ?>
                  <tr>
                    <td><?php echo $product_name ?></td>
                    <td><?php echo $price ?></td>
                    <td style="width:20px;">&nbsp;&nbsp;<?php echo $quantity ?></td>
                    <td><?php echo $total_price ?></td>
                  </tr>
                <?php } ?>
                <!--------------------------- End------------------------- -->

                
              </tbody>
            </table>
    </center>
            <!-- end  -->

                <center>
            <div style="margin-top: 10px;">
              <table width="37%">

               

                 <tr>
                  <th>Discount</th>
                  <td><?php echo $discount ?></td>
                </tr>

                 <tr>
                  <th>After Discount</th>
                  <td><?php echo $after_discount ?></td>
                </tr>

                <tr>
                  <th>Paid</th>
                  <td><?php echo $paid ?></td>
                </tr>

                  <tr>
                  <th>Remaining</th>
                  <td><?php echo $remain_amount ?></td>
                </tr>
              </table>
            </div>
                </center>


           <br>
            <center>
            <span style="font-size: 10px;"><center><b>&copy; Software Developed By MindGigs</b></center></span>
            <span style="font-size: 7px;"><center><b>Contact (+92) 302 8844114</b></center></span>

            </center>
            <br><br>

             
            <span style="color: white;"><center><b>. </b></center></span>
           
            <br><br>

        </div><!--End InvoiceBot-->
  </div><!--End Invoice-->


<?php
include 'include/js_links.php';
?>

</body>

<script>
  window.onload=function(){
    window.print();

    window.onafterprint = function() {
    window.location.href = "sale_add.php";
    } 

  if ($("#mytable td").length == '0'  ){
    $("#mytable").hide();  
    $("#span").hide();  
  }
  }
</script>
<!-- <script type="text/javascript">
  $(document).ready(function(){
  if ($("#mytable td").length == '0'  ){
    $("#mytable").hide();  
  }
});
</script> -->
<?php
include 'include/db.php';
?>

<link href="../../assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">


  
<style >
body{
color : black;
}
  #invoice-POS{
  margin: 0 auto;
  width: 70mm;
  background: #FFF;
}

table {
  border-collapse: collapse;
color : black;
}

table, td, th {
  border: 1px solid black;
color : black;
}
td ,th {
  padding-left:6px !important;
}
@media print
{


  #invoice-POS {
    margin-top: 0px;
    font-family: 'Times New Roman'; 
    width:100%;
color : black;

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
  $select = "SELECT cl.credit,cl.debit,s.id AS sale_id,c.name,c.address,c.mobile,c.email,s.after_discount FROM  sale AS s
INNER JOIN customer AS c ON c.id = s.customer_id
INNER JOIN customer_ledger AS cl ON cl.sale_id = s.id
WHERE s.id = '$id'";
  $run = mysqli_query($connection,$select);
  $row = mysqli_fetch_array($run);

  $credit = $row['credit'];
  $debit = $row['debit'];
  $after_discount = $row['after_discount'];
  $sale_id = $row['sale_id'];
  $name = $row['name'];
  $address = $row['address'];
  $mobile = $row['mobile'];
  $email = $row['email'];
?>


  <div id="invoice-POS" >
    
    
      <div class="top2">
    

    <b> <h1 style="text-align: center; font-size: 29px;">New Japan<br><span style="font-size: 22px;">Battery Center</span></h1></b>
     </div>
        <div style="margin-top: 0px;">
          <span><b>Invoice &nbsp; :</b></span>
    <span><b><?php echo $id ?></b></span>
    <br>
        <span><b>Contact</b>&nbsp;&nbsp;:&nbsp;05827446798</span>
        <br>
        <span><b>Address</b>&nbsp;&nbsp;:&nbsp;<span style="font-size: 15px;">Tambwano Morr Mukaram Khan Plaza Tehkal Payan University Road Peshawar</span></span>
      </div>
        <br>
        <div style="margin-bottom: 10px;">
    <span>Name &nbsp; &nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $name ?></span>
    <br>
    <span>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo date('d-m-Y',strtotime(date('Y-m-d'))) ?></span>
    
  </div>
     <!--End Info-->
    

    
    



       <!-- deal item list -->

                  <center id="span"><b>Item List</b></center>
            <table  border="1px solid grey" width="100%" id="mytable">

              <thead>
              <tr align="left">
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
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
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $quantity ?></td>
                    <td><?php echo $total_price ?></td>
                  </tr>
                <?php } ?>
                <!--------------------------- End------------------------- -->

                
              </tbody>
            </table>

            <!-- end  -->

            
            <div style="margin-top: 20px;">
              <table width="100%">

                <tr>
                  <th>Total After Discount</th>
                  <th>Paid</th>
                  <th>Remaining</th>
               
                </tr>
                <tr>
                  <td><?php echo $credit ?></td>
                  <td><?php echo $debit ?></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $credit - $debit ?></td>
                </tr>
              </table>
            </div>


            <hr style="margin-top: 20px;">
            <span style="font-size: 10px;"><center><b>&copy; Software Developed By MindGigs</b></center></span>
            <span style="font-size: 7px;"><center><b>Contact (+92) 302 8844114</b></center></span>

        </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
 </div>

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

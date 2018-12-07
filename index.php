<?php
	include("confs/config.php");
	
	$conn = mysqli_connect("localhost","root","","june_store");
	//$invoice_sql = "SELECT * FROM invoices";	
	//$invoice_result = mysqli_query($conn, $invoice_sql);

	$invoice_item_sql = "SELECT *, SUM(qty * price) AS total_qty FROM invoice_item_inof_view GROUP BY invoice_item_inof_view.inv_id 
	ORDER BY invoice_item_inof_view.invoice_id";
	$invoice_item_reult = mysqli_query($conn, $invoice_item_sql);

	$no_of_items_sql = "SELECT * FROM invoice_item_inof_view WHERE invoice_item_inof_view.inv_id = 1";
	$no_of_items_result = mysqli_query($conn, $no_of_items_sql);
	$no_of_items = mysqli_num_rows($no_of_items_result);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>June Store</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
		<link rel="stylesheet" type="text/css" href="css/1/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="css/1/bootstrap.css">
		<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
		<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="pages/row_add.js"></script>-->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<style type="text/css">
			td
			{
				 border: 1px solid White;
				 padding: 10px;
			}
			body
			{
				font-family: "Comic Sans MS", "Comic Sans", cursive; 
			}
		</style>
		<script type="text/javascript" src="js/jquery.js"></script>

    <script type="text/javascript">
    	        /*function getTotal()
        {
            var x = document.getElementById("qty").value;
            var y = document.getElementById("price").value;
            var total = Number(x) * Number(y);
            document.getElementById("total").innerHTML = total;
        }*/
      	function getTotal(rowvalue)
      	{
      		//alert(rowvalue);
      		var x = document.getElementById("qty" + rowvalue).value;
      		//alert(x);
          	var y = document.getElementById("price" + rowvalue).value;
          	//alert(y);
          	var total = Number(x) * Number(y);
          	//alert(total);
	        document.getElementById("total" + rowvalue).innerHTML = total;
	        document.getElementById("sample").value = rowvalue + 1;
	        document.getElementById("subtotal").innerHTML = total;
	        var subtotal = Number(document.getElementById("subtotal").innerHTML);
           
           var tax = subtotal / 100;
           document.getElementById("tax").value = tax;

           var alltotal = subtotal + tax;
           document.getElementById("alltotal").innerHTML = alltotal;
      	}
      

      </script>
	</head>
	<body>
		<h1 style="text-align: center;">June Store</h1>
		<hr style="border-top: 2px dashed Green; width: 50%; clear: float;">
					
		<div>
			<h2 style="text-align: left; margin-left: 340px;">Invoice List</h2>
			<div style="margin-left: 890px;">
				<button>+ Add Invoice</button>
			</div>	
			<div style="width: 25%; float: left; background-color: White; color: White;">a</div>
			<div style="width: 50%; float: left; background-color: White;">
				<table id="example" class="table table-striped table-bordered" style="width:100%;">
					<thead style="background-color: AntiqueWhite;">
						<td>Invoice Name</td>
						<td># of Items</td>
						<td>Total</td>
						<td></td>
					</thead>
					<tbody>
						<?php while($invoice_item_row = mysqli_fetch_assoc($invoice_item_reult)): ?>
						<tr>
							<td><?php echo $invoice_item_row['invoice_name'] ?></td>
							
							<!-- <?php
								$qty = $invoice_item_row['total_qty'];
								$price = $invoice_item_row['price'];
								$total = round($qty * $price); 
							?> -->
							<td><?php echo  $no_of_items ?></td>
							<td><?php echo $invoice_item_row['total_qty'] ?></td>
							<td><a href="">PDF</a>&nbsp;&nbsp;&nbsp;<a href="">Remove</a></td>
						</tr>
					<?php endwhile ?>
					</tbody>
					<tfoot style="background-color: AntiqueWhite;">
						<td>Invoice Name</td>
						<td># of Items</td>
						<td>Total</td>
						<td></td>
					</tfoot>
				</table>
			</div>
			<div style="width: 25%; background-color: White; color: White;">b</div>
		</div>
		<hr style="border-top: 2px dashed Green; width: 50%; clear: float;">
		<!-- <div style="width: 25%; float: left; background-color: Pink;">a</div>
		<div style="width: 50%; float: left; background-color: Red;">b</div>
		<div style="width: 25%; float: left; background-color: Blue;">c</div> -->
		<div>
			<h2  style="text-align: left; margin-left: 340px;">New Invoice</h2>
			<div style="width: 25%; float: left; background-color: White; color: White;">a</div>
			<div style="width: 50%; float: left; background-color: White;">
				<form action="pages/invoice_add.php" method="post" enctype="multipart/form-data" id="">
					<input type="hidden" name="sample" id="sample">
					<label>Invoice Name</label>
					<input type="text" name="invoice_name" id="invoice_name">
					<br>

					<table width="100%" id="myTable" class=" table order-list">
						<tr>
							<td>Item Name</td>
							<td># of items</td>
							<td>Price</td>
							<td>Total</td>
							<td></td>
						</tr>
						<tr>
							<td><input type="text" name="item_name0" oninput="" id="item_name0"></td>
							<td><input type="text" name="qty0" id="qty0"></td>
							<td><input type="text" name="price0" id="price0" oninput="getTotal(0)"></td>
							<td><label id="total0"></label></td>
							<td><a href=""><img src="images/trash-can-icon-png.png" style="width: 30px; height: 20px;"></a></td>
						</tr>
						<tr>
							<td><input type="text" name="item_name1" id="item_name1"></td>
							<td><input type="text" name="qty1" id="qty1"></td>
							<td><input type="text" name="price1" id="price1" oninput="getTotal(1)"></td>
							<td><label id="total1"></label></td>
							<td><a href=""><img src="images/trash-can-icon-png.png" style="width: 30px; height: 20px;"></a></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td colspan="5">
							<input type="button" class="btn btn-lg btn-block " id="addrow" value="+ Add Item" 
							style="background-color: White; width: 110px; height: 30px; font-size: 16px; border-color: grey; text-align: Center;" />
							</td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">Sub Total</td>
							<td><label id="subtotal"></label></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">Tax</td>
							<td><input type="text" name="" style="width: 50px;" id="tax"></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">Total</td>
							<td><label id="alltotal"></label></td>
							<td></td>
						</tr>
					</table>
					<br>
					<br>
					<input type="submit" value="Create">
					<br>
				</form>				
			</div>
			<div style="width: 25%; background-color: White; color: White;">b</div>
		</div>				
		<hr style="border-top: 2px dashed Green; width: 50%; clear: float;">
		<div>
			<h2  style="text-align: left; margin-left: 340px;">Update Invoice</h2>
			<div style="width: 25%; float: left; background-color: White; color: White;">a</div>
			<div style="width: 50%; float: left; background-color: White;">
				<form action="pages/invoice_update.php" method="post" enctype="multipart/form-data" id="">
					<label>Invoice Name</label>
					<input type="text" name="" id="">
					<br>
					<!-- <div class="container"> -->
					<table width="100%" id="updateinv">
						<tr>
							<td>Item Name</td>
							<td># of items</td>
							<td>Price</td>
							<td>Total</td>
							<td></td>
						</tr>
						<tr>
							<td><input type="text" name="item_name"></td>
							<td><input type="text" name="qty"></td>
							<td><input type="text" name="price"></td>
							<td><label>###</label></td>
							<td><a href=""><img src="images/trash-can-icon-png.png" style="width: 30px; height: 20px;"></a></td>
						</tr>
						<tr>
							<td><input type="text" name="item_name"></td>
							<td><input type="text" name="qty"></td>
							<td><input type="text" name="price"></td>
							<td><label>###</label></td>
							<td><a href=""><img src="images/trash-can-icon-png.png" style="width: 30px; height: 20px;"></a></td>
						</tr>
						<tr>
							<td colspan="5"><button>+ Add Item</button></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">Sub Total</td>
							<td>###</td>
							<td></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">Tax</td>
							<td><input type="text" name="" style="width: 50px;"></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">Total</td>
							<td>###</td>
							<td></td>
						</tr>
					</table>
					<br>
					<br>
					<input type="submit" value="Update">
					<br>
				</form>				
			</div>
			<div style="width: 25%; background-color: White; color: White;">b</div>
		</div>
		<script src="js/1/jquery-3.3.1.js"></script>
	    <script src="js/1/dataTables.bootstrap4.min.js"></script>
	    <script src="js/1/jquery.dataTables.min.js"></script>
	    <script type="text/javascript">
	      $(document).ready(function()
	      {
	        $("#example").DataTable();
	      });
    	</script>
    	<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    	<script type="text/javascript" src="js/1/bootstrap.min.js"></script>
		<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
		<script type="text/javascript" src="js/1/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/row_add.js"></script>
		</body>
</html>
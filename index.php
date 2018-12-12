<?php
	include("confs/config.php");
	
	$conn = mysqli_connect("localhost","root","","june_store");
	$invoice_item_sql = "SELECT *, SUM(qty * price) AS total_qty FROM invoice_item_inof_view GROUP BY invoice_item_inof_view.inv_id 
	ORDER BY invoice_item_inof_view.invoice_id";
	$invoice_item_reult = mysqli_query($conn, $invoice_item_sql);

	$no_of_items_sql = "SELECT COUNT(inv_id) AS total_items FROM invoice_item_inof_view GROUP BY inv_id";
	$no_of_items_result = mysqli_query($conn, $no_of_items_sql);

	$y = 0;
	$item_count[0] = 0;
	while($no_of_items_row = mysqli_fetch_assoc($no_of_items_result))
	{
		$item_count[$y] = $no_of_items_row['total_items'];
		$y = $y + 1;
	}
	
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
	        if(rowvalue == 0)
	        {
	        	document.getElementById("subtotal").innerHTML = total;
	        }
	        var total_value = new Array();
	        for(var i=0; i <= rowvalue; i++)
	        {
	        	total_value[i] = Number(document.getElementById("total" + i).innerHTML);
	        }
	        var subtotal = 0;
	        for(var j=0; j <= rowvalue; j++)
	        {
	        	subtotal += (total_value[j]);
	        }
	        //alert(subtotal);
	        document.getElementById("subtotal").innerHTML = subtotal;
	        var subtotal = Number(document.getElementById("subtotal").innerHTML);
           
           var tax = subtotal / 100;
           document.getElementById("tax").value = tax;

           var alltotal = subtotal + tax;
           document.getElementById("alltotal").innerHTML = alltotal;
      	}
      function getTotal1(rowvalue)
      	{
      		//alert(rowvalue);
      		var x = document.getElementById("qty_up" + rowvalue).value;
      		//alert(x);
          	var y = document.getElementById("price_up" + rowvalue).value;
          	//alert(y);
          	var total = Number(x) * Number(y);
          	//alert(total);
	        document.getElementById("total_up" + rowvalue).innerHTML = total;
	        document.getElementById("sample_up").value = rowvalue + 1;
	        if(rowvalue == 0)
	        {
	        	document.getElementById("subtotal_up").innerHTML = total;
	        }
	        var total_value1 = new Array();
	        for(var i=0; i <= rowvalue; i++)
	        {
	        	total_value1[i] = Number(document.getElementById("total_up" + i).innerHTML);
	        }
	        var subtotal = 0;
	        for(var j=0; j <= rowvalue; j++)
	        {
	        	subtotal += (total_value1[j]);
	        }
	        //alert(subtotal);
	        document.getElementById("subtotal_up").innerHTML = subtotal;
	        var subtotal = Number(document.getElementById("subtotal_up").innerHTML);
           
           var tax = subtotal / 100;
           document.getElementById("tax_up").value = tax;

           var alltotal = subtotal + tax;
           document.getElementById("alltotal_up").innerHTML = alltotal;
      	}
      	function setfocus() 
      	{
      		document.getElementById("invoice_name").focus();
      	}
      </script>
	</head>
	<body>
		<h1 style="text-align: center;">June Store</h1>
		<hr style="border-top: 2px dashed Green; width: 50%; clear: float;">
					
		<div>
			<h2 style="text-align: left; margin-left: 340px;">Invoice List</h2>
			<div style="margin-left: 890px;">
				<button onclick="setfocus()">+ Add Invoice</button>
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
					<?php	$y = 0; ?>
						<?php while($invoice_item_row = mysqli_fetch_assoc($invoice_item_reult)): ?>
						<tr>
							<td><a href="#upinv"><?php echo $invoice_item_row['invoice_name'] ?></a></td>
							<td><?php echo  $item_count[$y] ?></td>
							<td><?php echo round($invoice_item_row['total_qty']) ?></td>
							<td><a href="">PDF</a>&nbsp;&nbsp;&nbsp;<a href="">Remove</a></td>
						</tr>
						<?php $y = $y + 1; ?>
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
				<form action="pages/invoice_add.php" method="post" enctype="multipart/form-data" id="newinv">
					<input type="hidden" name="sample" id="sample">
					<label>Invoice Name</label>
					<input type="text" name="invoice_name" id="invoice_name" required>
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
							<td><input type="text" name="item_name0" oninput="" id="item_name0" required></td>
							<td><input type="text" name="qty0" id="qty0" required></td>
							<td><input type="text" name="price0" id="price0" oninput="getTotal(0)" required></td>
							<td><label id="total0"></label></td>
							<!-- <td><a href=""><img src="images/trash-can-icon-png.png" style="width: 30px; height: 20px;"></a></td> -->
							<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>
						</tr>
						<tr>
							<td><input type="text" name="item_name1" id="item_name1" required></td>
							<td><input type="text" name="qty1" id="qty1" required></td>
							<td><input type="text" name="price1" id="price1" oninput="getTotal(1)" required></td>
							<td><label id="total1"></label></td>
							<!-- <td><a href=""><img src="images/trash-can-icon-png.png" style="width: 30px; height: 20px;"></a></td> -->
							<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>
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
							<td><input type="text" name="tax" style="width: 50px;" id="tax"></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">Total</td>
							<td><label id="alltotal" name="alltotal"></label></td>
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
				<form action="pages/invoice_update.php" method="post" enctype="multipart/form-data" id="upinv">
				<?php 
					$invoice_sql = "SELECT * FROM `invoice_item_inof_view` where invoice_id = 1";
					$invoice_reult = mysqli_query($conn, $invoice_sql);	
					$invoice_reult1 = mysqli_query($conn, $invoice_sql);	
					$invoice_row1 = mysqli_fetch_assoc($invoice_reult1);
				?>
				
				<input type="hidden" name="sample_up" id="sample_up">
					<label>Invoice Name</label>
					<input type="text" name="" id="" value="<?php echo $invoice_row1['invoice_name'] ?>" required>
					<br>
					<!-- <div class="container"> -->
					<table width="100%" id="myTable" class=" table order-list1">
						<tr>
							<td>Item Name</td>
							<td># of items</td>
							<td>Price</td>
							<td>Total</td>
							<td></td>
						</tr>
						<?php while($invoice_row = mysqli_fetch_assoc($invoice_reult)): ?>
						<tr>							
							<td><input type="text" name="item_name_up0" id="item_name_up0" value="<?php echo $invoice_row['item_name'] ?>"required></td>
						
							<td><input type="text" name="qty_up0" id="qty_up0" value="<?php echo $invoice_row['qty'] ?>" required></td>
							<td><input type="text" name="price_up0" id="price_up0" value="<?php echo $invoice_row['price'] ?>" oninput="getTotal1(0)" required></td>
							<td><label id="total_up0"><?php echo $invoice_row['price'] * $invoice_row['qty'] ?></label></td>
							<!-- <td><a href=""><img src="images/trash-can-icon-png.png" style="width: 30px; height: 20px;"></a></td> -->
							<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>
						</tr>
						<?php endwhile ?>
						<tr>
							<td><input type="text" name="item_name_up1" id="item_name_up1" required></td>
							<td><input type="text" name="qty_up1" id="qty_up1" required></td>
							<td><input type="text" name="price_up1" id="price_up1" oninput="getTotal1(1)" required></td>
							<td><label id="total_up1"></label></td>
							<!-- <td><a href=""><img src="images/trash-can-icon-png.png" style="width: 30px; height: 20px;"></a></td> -->
							<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td colspan="5">
							<input type="button" class="btn btn-lg btn-block " id="addrow1" value="+ Add Item" 
							style="background-color: White; width: 110px; height: 30px; font-size: 16px; border-color: grey; text-align: Center;" />
							</td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">Sub Total</td>
							<td><label id="subtotal_up"></label></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">Tax</td>
							<td><input type="text" name="tax_up" style="width: 50px;" id="tax_up"></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">Total</td>
							<td><label id="alltotal_up" name="alltotal_up"></td>
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

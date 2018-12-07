<?php
	//include("../confs/config.php");
	
	$conn = mysqli_connect("localhost","root","","june_store");


	$invoice_name = $_POST['invoice_name'];
	if(strpos("$invoice_name"," ") >= 0)
	{
		$invoice_name = str_ireplace("'","","$invoice_name");
	}

	$item_rowvalue = $_POST['sample'];
	$items[0] = 0;
	$qtys[0] = 0;
	$prices[0] = 0;

	$a = 0;
	$i = 0;
	
	//Item Name Array
	for($i=0; $i < $item_rowvalue; $i++)
	{
		$items[$i] = $_POST['item_name' . $i];
	}
	/*for ($a=0; $a < $item_rowvalue; $a++) 
	{ 
		echo $items[$a] . "<br/>";
	}*/

	//Item Qty Array
	for($i=0; $i < $item_rowvalue; $i++)
	{
		$qtys[$i] = $_POST['qty' . $i];
	}
	/*for ($a=0; $a < $item_rowvalue; $a++) 
	{ 
		echo $qtys[$a] . "<br/>";
	}*/

	//Item Price Array
	for($i=0; $i < $item_rowvalue; $i++)
	{
		$prices[$i] = $_POST['price' . $i];
	}
	/*for ($a=0; $a < $item_rowvalue; $a++) 
	{ 
		echo $prices[$a] . "<br/>";
	}*/
	
	$modified_qty = 0;	
	
	$invoice_add_sql = "INSERT INTO invoices (invoice_name, created_date, modified_date)
	VALUES ('$invoice_name', now(), now())";
	mysqli_query($conn, $invoice_add_sql);

	$inv_id = mysqli_insert_id($conn);

	for($i=0; $i < $item_rowvalue; $i++)
	{
		$item = $items[$i];
		$price = $prices[$i];
		$qty = $qtys[$i];

		$invoice_item_add_sql = "INSERT INTO items (item_name, price, original_qty, modified_qty, created_date, modified_date)
							VALUES ('$item', '$price', '$qty', $modified_qty, now(), now())";
		mysqli_query($conn, $invoice_item_add_sql);

		$item_id = mysqli_insert_id($conn);
		$invoice_item_info_add_sql = "INSERT INTO invoice_item_info (invoice_id, item_id, qty, price)
							VALUES ('$inv_id', '$item_id', '$qty', '$price')";
		mysqli_query($conn, $invoice_item_info_add_sql);
	}
	header("location: ../index.php");	
?>
<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>last invoice id = <?php echo $inv_id ?></h1>
	<h1>total items = <?php echo $item_rowvalue ?></h1>
</body>
</html> -->
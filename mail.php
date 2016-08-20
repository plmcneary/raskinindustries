<?php
if(isset($_POST['send_email']))
	{
		global $wpdb;
		$tableName = $wpdb->prefix . "contact";
		if(is_array($_POST['product']) and count($_POST['product'])>0){
			foreach($_POST['product'] as $product_val){
				$selected_product .= "<tr><td>Product</td><td>".$product_val."</td></tr>";
			} }
			$first_name = $_POST['first_name'];	
			$email = $_POST['email'];	
			$message = $_POST['message'];	
			$post_title = $_POST['post_title'];
			
			
			
			$product_selected     = implode(",",$_POST['product']);
			$sql = "insert into $tableName set
			first_name  = '".$first_name."',
			email       = '".$email."',
			message     = '".$message."',
			post_title  = '".$post_title."',
			product     =  '".$product_selected."' ";
			mysql_query($sql);	
			
			$to = get_option('talent_payment_email');
			$subject = "Raskin";
			$message = "
			<html>
			<head>
			<title>Raskin email</title>
			</head>
			<body>
			<table style='border:1px solid #ddd;width:100%;padding-left:12px;line-height:31px;'>
			<tr>
			<td>Name</td>
			<td>".$first_name."</td>
			</tr>
			<tr>
			<td>Email</td>
			<td>".$email."</td>
			</tr>
			<tr>
			<td>Message</td>
			<td>".$message."</td>
			</tr>
			
			<tr>
			<td>Product type</td>
			<td>".$post_title."</td>
			</tr>
			
			".$selected_product.";
			</table>
			</body>
			</html>
			";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$riderect_page = $_SERVER['REQUEST_URI'];
			
			// More headers
			$headers .= 'From: <'.$email.'>' . "\r\n";
			mail($to,$subject,$message,$headers);
			echo '<script>alert("Your message has been successfully sent")</script>';
			header("Location: $riderect_page");
			
	}
?>

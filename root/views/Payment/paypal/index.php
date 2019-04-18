<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> Pay for Membership </title>
	</head>
	<body>	
		<div class="payment_container">
			<div class="container-fluid">
				<h2 class="header"> Pay for Membership </h2>
					
							<form action="checkout.php" method = "post" autocomplete="off">
																
								Membership Level:<br/> <input type="text" class="ak_inputfield" name="title" /><br/>
											
								Amount:<br/> <input type="text" class="ak_inputfield" name="price" /><br/>										
								
								 <input type="submit"  value="Pay">
								 								 
							</form>	
								<p> You'll be taken to Paypal to complete your payment.</p>
						
				
				
			</div>

		</div>
	</body>
</html>
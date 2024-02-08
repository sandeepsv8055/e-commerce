<?php
session_start();

include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $zipcode = mysqli_real_escape_string($con, $_POST['zipcode']);
    $creditcardnumber = mysqli_real_escape_string($con, $_POST['creditcardnumber']);
    $expmonth = mysqli_real_escape_string($con, $_POST['expmonth']);
    $expyear = mysqli_real_escape_string($con, $_POST['expyear']);
    $cvv = mysqli_real_escape_string($con, $_POST['cvv']);

    if (!empty($username) && !empty($email) && !empty($address) && !empty($city) && !empty($state) && !empty($zipcode) && !empty($creditcardnumber) && !empty($expmonth) && !empty($expyear) && !empty($cvv)) {
        $query = "INSERT INTO payment_data (username, email, address, city, state, zipcode, creditcardnumber, expmonth, expyear, cvv) VALUES ('$username', '$email', '$address', '$city', '$state', '$zipcode', '$creditcardnumber', '$expmonth', '$expyear', '$cvv')";
        mysqli_query($con, $query);

        echo "<p>Payment Successful</p>";
        // You can set session variables or redirect the user to a different page after successful payment
    } else {
        echo "<p>Please enter valid information for all fields</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Payment </title>
	<link rel="stylesheet" type="text/css" href="payment.css">
</head>
<body>
<header>
	<div class="container">
		<div class="left">
			<h3>BILLING ADDRESS</h3>
			<form>
				Full name
				<input type="text" name="username" placeholder="Enter name">
				Email
				<input type="text" name="email" placeholder="Enter email">

				Address
				<input type="text" name="address" placeholder="Enter address">
				
				City
				<input type="text" name="city" placeholder="Enter City">
				<div id="zip">
					<label>
						State
						<input type="text" name="state" placeholder="Enter state">
					</label>
						<label>
						Zip code
						<input type="number" name="zipcode" placeholder="Zip code">
					</label>
				</div>
			</form>
		</div>
		<div class="right">
			<h3>PAYMENT</h3>
			<form>
				Accepted Card <br>
				<img src="assets/images/payment1.jpeg" width="100">
				<img src="assets/images/payment2.jpeg" width="50">
				<br><br>

				Credit card number
			<input type="text" name="creditcardnumber" placeholder="Enter card number">
				
				Exp month
				<input type="text" name="expmonth" placeholder="Enter Month">
				<div id="zip">
					<label>
						Exp year
						<input type="text" name="expyear" placeholder="Enter Year">
					</label>
						<label>
						CVV
						<input type="number" name="cvv" placeholder="CVV">
					</label>
				</div>
			</form>
			<input type="submit" name="" value="Proceed to Checkout">
		</div>
	</div>
</header>
</body>
</html>
<?php include("inc/connect.inc.php");
include("functions.php") ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
} else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($con, "SELECT * FROM user WHERE id='$user'");
	$get_user_email = mysqli_fetch_assoc($result);
	$uname_db = $get_user_email != null ? $get_user_email['firstName'] : null;
}
$resultat = getProducts($con);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Welcome to nita's online grocery</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="/js/homeslideshow.js"></script>
</head>

<body style="min-width: 980px;">
	<div class="homepageheader" style="position: relative;">
		<div class="signinButton loginButton">
			<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
				<?php
				if ($user != "") {
					echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
				} else {
					echo '<a style="color: #fff; text-decoration: none;" href="signin.php">SIGN UP</a>';
				}
				?>

			</div>
			<div class="uiloginbutton signinButton loginButton" style="">
				<?php
				if ($user != "") {
					echo '<a style="text-decoration: none; color: #fff;" href="profile.php?uid=' . $user . '">Hi ' . $uname_db . '</a>';
				} else {
					echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
				}
				?>
			</div>
		</div>
		<div style="float: left; margin: 5px 0px 0px 23px;">
			<a href="index.php">
				<img style=" height: 75px; width: 130px;" src="image/cart.png">
			</a>
		</div>
		<div class="">
			<div id="srcheader">
				<form id="newsearch" method="get" action="search.php">
					<input type="text" class="srctextinput" name="keywords" size="21" maxlength="120" placeholder="Search Here..."><input type="submit" value="search" class="srcbutton">
				</form>
				<div class="srcclear"></div>
			</div>
		</div>
	</div>
	<div class="home-welcome">
		<div class="home-welcome-text" style="background-image: url(image/background.jpg); height: 380px; ">
			<div style="padding-top: 180px;">
				<div style=" background-color: #dadbe6;">
					<h1 style="margin: 0px;">Welcome To nita's online grocery</h1>
					<h2>Most Convenient Store in 7th ave. Caloocan</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="home-prodlist">
		<div>
			<h3 style="text-align: center;">Products Category</h3>
		</div>
		<div style="padding: 20px 30px; width: 85%; margin: 0 auto;">
			<?php
			while ($products = mysqli_fetch_assoc($resultat)) {
			?>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img">
							<a href="Products.php?item=<?php echo $products["item"]; ?>">
								<img src="./image/product/<?php echo $products["item"]; ?>/<?php echo $products["item"]; ?>.jpg" class="home-prodlist-imgi">
							</a>
						</div>
					</li>
				</ul>
			<?php } ?>
		</div>
	</div>
</body>

</html>
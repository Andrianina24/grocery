<?php include("/inc/connect.inc.php");
include("functions.php"); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
    $user = "";
} else {
    $user = $_SESSION['user_login'];
    $result = mysqli_query($con, "SELECT * FROM user WHERE id='$user'");
    $get_user_email = mysqli_fetch_assoc($result);
    $uname_db = $get_user_email['firstName'];
}

$ig = $_GET["item"];
$products = getProductByItem($con, $ig);
$active = "#24bfae";
$passive = "#e6b7b8";
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $ig; ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="categolis">
        <table>
            <tr>
                <th>
                    <a href="Products.php?item=noodles" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: <?php if ($ig == "noodles") {
                                                                                                                                            echo $active;
                                                                                                                                        } else {
                                                                                                                                            echo $passive;
                                                                                                                                        } ?>;border-radius: 12px;">Noodles&Canned</a>
                </th>
                <th><a href="Products.php?item=seasoning" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: <?php if ($ig == "seasoning") {
                                                                                                                                                echo $active;
                                                                                                                                            } else {
                                                                                                                                                echo $passive;
                                                                                                                                            } ?>;border-radius: 12px;">Seasonings</a></th>
                <th><a href="Products.php?item=drink" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: <?php if ($ig == "drink") {
                                                                                                                                            echo $active;
                                                                                                                                        } else {
                                                                                                                                            echo $passive;
                                                                                                                                        } ?>;border-radius: 12px;">Drinks</a></th>
                <th><a href="Products.php?item=snack" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: <?php if ($ig == "snack") {
                                                                                                                                            echo $active;
                                                                                                                                        } else {
                                                                                                                                            echo $passive;
                                                                                                                                        } ?>;border-radius: 12px;">Snacks</a></th>
                <th><a href="Products.php?item=sweet" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: <?php if ($ig == "sweet") {
                                                                                                                                            echo $active;
                                                                                                                                        } else {
                                                                                                                                            echo $passive;
                                                                                                                                        } ?>;border-radius: 12px;">Sweets</a></th>
                <th><a href="Products.php?item=soap" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: <?php if ($ig == "soap") {
                                                                                                                                            echo $active;
                                                                                                                                        } else {
                                                                                                                                            echo $passive;
                                                                                                                                        } ?>;border-radius: 12px;">Soap&Detergent</a></th>
                <th><a href="Products.php?item=shampoo" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: <?php if ($ig == "shampoo") {
                                                                                                                                            echo $active;
                                                                                                                                        } else {
                                                                                                                                            echo $passive;
                                                                                                                                        } ?>;border-radius: 12px;">Shampoo</a></th>
                <th><a href="Products.php?item=hygiene" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: <?php if ($ig == "hygiene") {
                                                                                                                                            echo $active;
                                                                                                                                        } else {
                                                                                                                                            echo $passive;
                                                                                                                                        } ?>;border-radius: 12px;">Hygiene</a></th>
            </tr>
        </table>
    </div>
    <div style="padding: 15px 0px; font-size: 15px; margin: 0 auto; display: table; width: 98%;">
        <div>
            <?php while ($liste = mysqli_fetch_assoc($products)) { ?>

                            <ul id="recs">
							<ul style="float: left;">
								<li style="float: left; padding: 0px 25px 25px 25px;">
									<div class="home-prodlist-img"><a href="view_product.php?pid=<?php echo $liste["id"] ?>">
										<img src="./image/product/<?php echo $liste['item'] ?>/<?php echo $liste['picture'] ?>" alt="/image/product/<?php echo $liste['item'] ?>/<?php echo $liste['picture'] ?>" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;"><?php echo $liste['pName'] ?></span><br> Price: <?php echo $liste['price'] ?> Php</div>
									</div>
									
								</li>
							</ul>
            <?php } ?>

        </div>
    </div>
</body>

</html>
<?php session_start();

$grandTotal = 0;

if (isset($_POST['submit'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['mobile'] = $_POST['mobile'];
}

function sessionToString($session)
{
    switch ($session) {
        case "MON-1":
            return "Monday - 1pm";
        case "MON-6":
            return "Monday - 6pm";
        case "MON-9":
            return "Monday - 9pm";

        case "TUES-1":
            return "Tuesday - 1pm";
        case "TUES-6":
            return "Tuesday - 6pm";
        case "TUES-9":
            return "Tuesday - 9pm";

        case "WED-1":
            return "Wednesday - 1pm";
        case "WED-6":
            return "Wednesday - 6pm";
        case "WED-9":
            return "Wednesday - 9pm";

        case "THUR-1":
            return "Thursday - 1pm";
        case "THUR-6":
            return "Thursday - 6pm";
        case "THUR-9":
            return "Thursday - 9pm";

        case "FRI-1":
            return "Friday - 1pm";
        case "FRI-6":
            return "Friday - 6pm";
        case "FRI-9":
            return "Friday - 9pm";

        case "SAT-12":
            return "Saturday - 12pm";
        case "SAT-3":
            return "Saturday - 3pm";
        case "SAT-6":
            return "Saturday - 6pm";
        case "SAT-9":
            return "Saturday - 9pm";

        case "SUN-12":
            return "Sunday - 12pm";
        case "SUN-3":
            return "Sunday - 3pm";
        case "SUN-6":
            return "Sunday - 6pm";
        case "SUN-9":
            return "Sunday - 9pm";

        default:
            return "ERROR";
    }
}

function chargeWeekndPrice($session)
{
    switch ($session) {
        case "MON-1":
            return false;
        case "MON-6":
            return false;
        case "MON-9":
            return false;

        case "TUES-1":
            return false;
        case "TUES-6":
            return false;
        case "TUES-9":
            return false;

        case "WED-1":
            return false;
        case "WED-6":
            return true;
        case "WED-9":
            return true;

        case "THUR-1":
            return false;
        case "THUR-6":
            return true;
        case "THUR-9":
            return true;

        case "FRI-1":
            return false;
        case "FRI-6":
            return true;
        case "FRI-9":
            return true;

        case "SAT-12":
            return true;
        case "SAT-3":
            return true;
        case "SAT-6":
            return true;
        case "SAT-9":
            return true;

        case "SUN-12":
            return true;
        case "SUN-3":
            return true;
        case "SUN-6":
            return true;
        case "SUN-9":
            return true;

        default:
            return "ERROR";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Now Showing</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"/>
    <link rel="stylesheet" href="wip.css" media="screen"/>
    <link rel="stylesheet" href="print.css" media="print"/>
</head>
<body>
<nav class="hide-on-print">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="now_showing/index.php">Now Showing</a></li>
        <li><a href="now_showing/booking.php">View Cart</a></li>
        <li><a href="about">About</a></li>
    </ul>
</nav>
<br><br><br><br><br>
<header>
</header>
<main>
    <div class="hide-on-print" id="centre">

        <?php

        $ordersFile = new DOMDocument();
        $ordersFile->loadHTMLFile('orders.html');
        $ordersBody = $ordersFile->getElementById("body");

                $purchaseDetails =
                    "<div>".date("l jS \of F Y h:i:s A")."
                        <fieldset>
                        <legend>Customer Details</legend>
                        <table style=\"width: 100%;\">
                            <tr>
                                <th style=\"float: left;\">Name</th>
                                <td style=\"float: right;\">".$_SESSION['name']."</td>
                            </tr>
                            <tr>
                                <th style=\"float: left;\">Email</th>
                                    <td style=\"float: right;\">".$_SESSION['email']."</td>
                            </tr>
                            <tr>
                                <th style=\"float: left;\">Mobile</th>
                                <td style=\"float: right;\">".$_SESSION['mobile']."</td>
                            </tr></table></fieldset>
                            <fieldset><legend>Customer Bookings</legend>
                            <br>";
        if (isset($_SESSION['bookingList'])) {
            $bookingTotal = 0;
            foreach ($_SESSION['bookingList'] as $bookingInfo) {
                $seatingInfo = "";

                if ($bookingInfo['seats_SF'] != 0) {
                    $seatingInfo = $seatingInfo .
                        "<tr>
                            <td style=\"float: left;\">".$bookingInfo['seats_SF']." x Standard (Full)</td>
                            <td style=\"float: right;\">".'$'.(int)$bookingInfo['seats_SF'] * (chargeWeekndPrice($bookingInfo['session']) ? 18.50 : 12.50)."</td>
                        </tr>";
                }
                if ($bookingInfo['seats_SP'] != 0) {
                    $seatingInfo = $seatingInfo .
                        "<tr>
                            <td style=\"float: left;\">".$bookingInfo['seats_SP']." x Standard (Concession)</td>
                            <td style=\"float: right;\">".'$'.(int)$bookingInfo['seats_SP'] * (chargeWeekndPrice($bookingInfo['session']) ? 15.50 : 10.50)."</td>
                        </tr>";
                }
                if ($bookingInfo['seats_SC'] != 0) {
                    $seatingInfo = $seatingInfo .
                        "<tr>
                            <td style=\"float: left;\">".$bookingInfo['seats_SC']." x Standard (Child)</td>
                            <td style=\"float: right;\">".'$'.(int)$bookingInfo['seats_SC'] * (chargeWeekndPrice($bookingInfo['session']) ? 15.50 : 10.50)."</td>
                        </tr>";
                }

                if ($bookingInfo['seats_FF'] != 0) {
                    $seatingInfo = $seatingInfo .
                        "<tr>
                            <td style=\"float: left;\">".$bookingInfo['seats_FF']." x First Class (Adult)</td>
                            <td style=\"float: right;\">".'$'.(int)$bookingInfo['seats_FF'] * (chargeWeekndPrice($bookingInfo['session']) ? 15.50 : 10.50)."</td>
                        </tr>";
                }
                if ($bookingInfo['seats_FC'] != 0) {
                    $seatingInfo = $seatingInfo .
                        "<tr>
                            <td style=\"float: left;\">".$bookingInfo['seats_FC']." x First Class (Child)</td>
                            <td style=\"float: right;\">".'$'.(int)$bookingInfo['seats_FC'] * (chargeWeekndPrice($bookingInfo['session']) ? 15.50 : 10.50)."</td>
                        </tr>";
                }

                if ($bookingInfo['seats_BA'] != 0) {
                    $seatingInfo = $seatingInfo .
                        "<tr>
                            <td style=\"float: left;\">".$bookingInfo['seats_BA']." x Beanbag (Adult)</td>
                            <td style=\"float: right;\">".'$'.(int)$bookingInfo['seats_BA'] * (chargeWeekndPrice($bookingInfo['session']) ? 15.50 : 10.50)."</td>
                        </tr>";
                }
                if ($bookingInfo['seats_BF'] != 0) {
                    $seatingInfo = $seatingInfo .
                        "<tr>
                            <td style=\"float: left;\">".$bookingInfo['seats_BF']." x Beanbag (Family)</td>
                            <td style=\"float: right;\">".'$'.(int)$bookingInfo['seats_BF'] * (chargeWeekndPrice($bookingInfo['session']) ? 15.50 : 10.50)."</td>
                        </tr>";
                }
                if ($bookingInfo['seats_BC'] != 0) {
                    $seatingInfo = $seatingInfo .
                        "<tr>
                            <td style=\"float: left;\">".$bookingInfo['seats_BC']." x Beanbag (Child)</td>
                            <td style=\"float: right;\">".'$'.(int)$bookingInfo['seats_BC'] * (chargeWeekndPrice($bookingInfo['session']) ? 15.50 : 10.50)."</td>
                        </tr>";
                }
                $seatingTotal = 0;
                if (chargeWeekndPrice($bookingInfo['session'])) {
                    $seatingTotal =
                        (int)$bookingInfo['seats_SF'] * 18.50 +
                        (int)$bookingInfo['seats_SP'] * 15.50 +
                        (int)$bookingInfo['seats_SC'] * 12.50 +
                        (int)$bookingInfo['seats_FF'] * 30 +
                        (int)$bookingInfo['seats_FC'] * 25 +
                        (int)$bookingInfo['seats_BA'] * 33 +
                        (int)$bookingInfo['seats_BF'] * 30 +
                        (int)$bookingInfo['seats_BC'] * 30;

                } else {
                    $seatingTotal =
                        (int)$bookingInfo['seats_SF'] * 12.50 +
                        (int)$bookingInfo['seats_SP'] * 10.50 +
                        (int)$bookingInfo['seats_SC'] * 8.50 +
                        (int)$bookingInfo['seats_FF'] * 25 +
                        (int)$bookingInfo['seats_FC'] * 20 +
                        (int)$bookingInfo['seats_BA'] * 22 +
                        (int)$bookingInfo['seats_BF'] * 20 +
                        (int)$bookingInfo['seats_BC'] * 20;
                }

                $bookingTotal += $seatingTotal;

                $seatingInfo = $seatingInfo .
                    "<tr>
                        <td style=\"float: left;\"></td>
                        <td style=\"float: right;\">Subtotal: ".'$'.$seatingTotal."</td>
                    </tr>";

                $purchaseDetails = $purchaseDetails .
                    "<fieldset>
                        <legend>".$bookingInfo['movie']."</legend>
                        <table style=\"width: 100%;\">".$seatingInfo."</table>
                    </fieldset>";
            }
        }

        $purchaseDetails = $purchaseDetails.
            "<label>Total: ".'$'.$bookingTotal."</label></fieldset><br><br></div>";

        $orderInfo = new DOMDocument();
        $orderInfo->loadHTML($purchaseDetails);

        $newOrder = $orderInfo->getElementsByTagName("div")->item(0);
        $newOrder = $ordersFile->importNode($newOrder, true);

        $ordersBody->appendChild($newOrder);

        $ordersFile->saveHTMLFile('orders.html');
        ?>

        <h2>Thank you</h2>
        <h3>Here is a summary of your order</h3>
        <br>
        <fieldset>
            <table class="userinfo">
                <tr>
                    <th style="float: left;">Name</th>
                    <td style="float: right;"><?php echo $_SESSION['name']; ?></td>
                </tr>
                <tr>
                    <th style="float: left;">Email</th>
                    <td style="float: right;"><?php echo $_SESSION['email']; ?></td>
                </tr>
                <tr>
                    <th style="float: left;">Mobile</th>
                    <td style="float: right;"><?php echo $_SESSION['mobile']; ?></td>
                </tr>
            </table>
        </fieldset>
        <?php if (isset($_SESSION['bookingList'])) {
            foreach ($_SESSION['bookingList'] as $bookingInfo) {
                ?>
                <fieldset>
                    <h2><?php echo $bookingInfo['movie']; ?></h2>
                    <p>Showing at <?php echo sessionToString($bookingInfo['session']); ?></p>
                    <table style="width: 100%;">
                        <col width="34%">
                        <col width="22%">
                        <col width="22%">
                        <col width="22%">
                        <tr>
                            <th>Ticket Type</th>
                            <th>Cost</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php if ($bookingInfo['seats_SF'] != 0) { ?>
                            <tr>
                                <td>Standard (Full)</td>
                                <td><?php echo '$' . (chargeWeekndPrice($bookingInfo['session']) ? '18.50' : '12.50'); ?></td>
                                <td><?php echo $bookingInfo['seats_SF']; ?></td>
                                <td><?php echo '$' . (int)$bookingInfo['seats_SF'] * (chargeWeekndPrice($bookingInfo['session']) ? 18.50 : 12.50); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_SP'] != 0) { ?>
                            <tr>
                                <td>Standard (Concession)</td>
                                <td><?php echo '$' . (chargeWeekndPrice($bookingInfo['session']) ? '15.50' : '10.50'); ?></td>
                                <td><?php echo $bookingInfo['seats_SP']; ?></td>
                                <td><?php echo '$' . (int)$bookingInfo['seats_SP'] * (chargeWeekndPrice($bookingInfo['session']) ? 15.50 : 10.50); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_SC'] != 0) { ?>
                            <tr>
                                <td>Standard (Child)</td>
                                <td><?php echo '$' . (chargeWeekndPrice($bookingInfo['session']) ? '12.50' : '8.50'); ?></td>
                                <td><?php echo $bookingInfo['seats_SC']; ?></td>
                                <td><?php echo '$' . (int)$bookingInfo['seats_SC'] * (chargeWeekndPrice($bookingInfo['session']) ? 12.50 : 8.50); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_FF'] != 0) { ?>
                            <tr>
                                <td>First Class (Full)</td>
                                <td><?php echo '$' . (chargeWeekndPrice($bookingInfo['session']) ? '30' : '25'); ?></td>
                                <td><?php echo $bookingInfo['seats_FF']; ?></td>
                                <td><?php echo '$' . (int)$bookingInfo['seats_FF'] * (chargeWeekndPrice($bookingInfo['session']) ? 30 : 20); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_FC'] != 0) { ?>
                            <tr>
                                <td>First Class (Child)</td>
                                <td><?php echo '$' . (chargeWeekndPrice($bookingInfo['session']) ? '25' : '20'); ?></td>
                                <td><?php echo $bookingInfo['seats_FC']; ?></td>
                                <td><?php echo '$' . (int)$bookingInfo['seats_FC'] * (chargeWeekndPrice($bookingInfo['session']) ? 25 : 20); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_BA'] != 0) { ?>
                            <tr>
                                <td>Beanbag (Adult)</td>
                                <td><?php echo '$' . (chargeWeekndPrice($bookingInfo['session']) ? '33' : '22'); ?></td>
                                <td><?php echo $bookingInfo['seats_BA']; ?></td>
                                <td><?php echo '$' . (int)$bookingInfo['seats_BA'] * (chargeWeekndPrice($bookingInfo['session']) ? 33 : 22); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_BF'] != 0) { ?>
                            <tr>
                                <td>Beanbag (Family)</td>
                                <td><?php echo '$' . (chargeWeekndPrice($bookingInfo['session']) ? '30' : '20'); ?></td>
                                <td><?php echo $bookingInfo['seats_BF']; ?></td>
                                <td><?php echo '$' . (int)$bookingInfo['seats_BF'] * (chargeWeekndPrice($bookingInfo['session']) ? 30 : 20); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_BC'] != 0) { ?>
                            <tr>
                                <td>Beanbag (Child)</td>
                                <td><?php echo '$' . (chargeWeekndPrice($bookingInfo['session']) ? '30' : '20'); ?></td>
                                <td><?php echo $bookingInfo['seats_BC']; ?></td>
                                <td><?php echo '$' . (int)$bookingInfo['seats_BC'] * (chargeWeekndPrice($bookingInfo['session']) ? 30 : 20); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>
                                <?php
                                if (chargeWeekndPrice($bookingInfo['session'])) {
                                    $grandTotal +=
                                        (int)$bookingInfo['seats_SF'] * 18.50 +
                                        (int)$bookingInfo['seats_SP'] * 15.50 +
                                        (int)$bookingInfo['seats_SC'] * 12.50 +
                                        (int)$bookingInfo['seats_FF'] * 30 +
                                        (int)$bookingInfo['seats_FC'] * 25 +
                                        (int)$bookingInfo['seats_BA'] * 33 +
                                        (int)$bookingInfo['seats_BF'] * 30 +
                                        (int)$bookingInfo['seats_BC'] * 30;
                                } else {
                                    $grandTotal +=
                                        (int)$bookingInfo['seats_SF'] * 12.50 +
                                        (int)$bookingInfo['seats_SP'] * 10.50 +
                                        (int)$bookingInfo['seats_SC'] * 8.50 +
                                        (int)$bookingInfo['seats_FF'] * 25 +
                                        (int)$bookingInfo['seats_FC'] * 20 +
                                        (int)$bookingInfo['seats_BA'] * 22 +
                                        (int)$bookingInfo['seats_BF'] * 20 +
                                        (int)$bookingInfo['seats_BC'] * 20;
                                }
                                echo '$';
                                if (chargeWeekndPrice($bookingInfo['session'])) {
                                    echo
                                        (int)$bookingInfo['seats_SF'] * 18.50 +
                                        (int)$bookingInfo['seats_SP'] * 15.50 +
                                        (int)$bookingInfo['seats_SC'] * 12.50 +
                                        (int)$bookingInfo['seats_FF'] * 30 +
                                        (int)$bookingInfo['seats_FC'] * 25 +
                                        (int)$bookingInfo['seats_BA'] * 33 +
                                        (int)$bookingInfo['seats_BF'] * 30 +
                                        (int)$bookingInfo['seats_BC'] * 30;
                                } else {
                                    echo
                                        (int)$bookingInfo['seats_SF'] * 12.50 +
                                        (int)$bookingInfo['seats_SP'] * 10.50 +
                                        (int)$bookingInfo['seats_SC'] * 8.50 +
                                        (int)$bookingInfo['seats_FF'] * 25 +
                                        (int)$bookingInfo['seats_FC'] * 20 +
                                        (int)$bookingInfo['seats_BA'] * 22 +
                                        (int)$bookingInfo['seats_BF'] * 20 +
                                        (int)$bookingInfo['seats_BC'] * 20;
                                }


                                ?>
                            </th>
                        </tr>
                    </table>
                </fieldset>
            <?php } ?>
            <?php echo '<h3>Grand Total: $' . $grandTotal . '</h3>'; ?>

        <?php } else { ?>
            <h2>Your cart is empty!</h2>
        <?php } ?>
        <br><br>

        <div class="container">
            <div class="column">
                <form action ="index.php" method="post">
                    <button class="submit" name="clearCart">Return</button>
                </form>
            </div>
            <div class="column">
                <form>
                    <button type="submit" onclick="window.print();">Print Receipt</button>
                </form>
            </div>
        </div>

    </div>

    <div class="print-only" id="centre-print">
        <h3>Customer Receipt:</h3>
        <br>
        <?php
        if (isset($_SESSION['bookingList'])) {
            foreach ($_SESSION['bookingList'] as $bookingInfo) {
                ?>
                <!--Print Receipt-->
                <fieldset>
                    <table class="userinfo">
                        <tr>
                            <td style="float: left;"><?php echo $_SESSION['name']; ?></td>
                            <td style="float: right;">Silverado</td>
                        </tr>
                        <tr>
                            <td style="float: left;"><?php echo $_SESSION['email']; ?></td>
                            <td style="float: right;"><?php echo $bookingInfo['movie']; ?></td>
                        </tr>
                        <tr>
                            <td style="float: left;"><?php echo $_SESSION['mobile']; ?></td>
                            <td style="float: right;"><?php echo sessionToString($bookingInfo['session']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="height: 10px"></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="height: 10px"></td>
                        </tr>
                        <br><br><br>
                        <?php if ($bookingInfo['seats_SF'] != 0) { ?>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['seats_SF']; ?> x Standard (Full)</td>
                                <td style="float: right"><?php echo '$' . (int)$bookingInfo['seats_SF'] * (chargeWeekndPrice($bookingInfo['session']) ? 18.50 : 12.50); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_SP'] != 0) { ?>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['seats_SP']; ?> x Standard
                                    (Concession)
                                </td>
                                <td style="float: right"><?php echo '$' . (int)$bookingInfo['seats_SP'] * (chargeWeekndPrice($bookingInfo['session']) ? 15.50 : 10.50); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_SC'] != 0) { ?>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['seats_SC']; ?> x Standard (Child)</td>
                                <td style="float: right"><?php echo '$' . (int)$bookingInfo['seats_SC'] * (chargeWeekndPrice($bookingInfo['session']) ? 12.50 : 8.50); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_FF'] != 0) { ?>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['seats_FF']; ?> x First Class (Adult)
                                </td>
                                <td style="float: right"><?php echo '$' . (int)$bookingInfo['seats_FF'] * (chargeWeekndPrice($bookingInfo['session']) ? 30 : 25); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_FC'] != 0) { ?>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['seats_FC']; ?> x First Class (Child)
                                </td>
                                <td style="float: right"><?php echo '$' . (int)$bookingInfo['seats_FC'] * (chargeWeekndPrice($bookingInfo['session']) ? 25 : 20); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_BA'] != 0) { ?>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['seats_BA']; ?> x Beanbag (Adult)</td>
                                <td style="float: right"><?php echo '$' . (int)$bookingInfo['seats_BA'] * (chargeWeekndPrice($bookingInfo['session']) ? 33 : 22); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_BF'] != 0) { ?>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['seats_BF']; ?> x Beanbag (Family)</td>
                                <td style="float: right"><?php echo '$' . (int)$bookingInfo['seats_BF'] * (chargeWeekndPrice($bookingInfo['session']) ? 30 : 20); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($bookingInfo['seats_BC'] != 0) { ?>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['seats_BC']; ?> x Beanbag (Child)</td>
                                <td style="float: right"><?php echo '$' . (int)$bookingInfo['seats_BC'] * (chargeWeekndPrice($bookingInfo['session']) ? 30 : 20); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" style="height: 10px"></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="height: 10px"></td>
                        </tr>
                        <tr>
                            <td style="float: left;"></td>
                            <td style="float: right;">Total:
                                <?php
                                echo "$";
                                if (chargeWeekndPrice($bookingInfo['session'])) {
                                    echo
                                        (int)$bookingInfo['seats_SF'] * 18.50 +
                                        (int)$bookingInfo['seats_SP'] * 15.50 +
                                        (int)$bookingInfo['seats_SC'] * 12.50 +
                                        (int)$bookingInfo['seats_FF'] * 30 +
                                        (int)$bookingInfo['seats_FC'] * 25 +
                                        (int)$bookingInfo['seats_BA'] * 33 +
                                        (int)$bookingInfo['seats_BF'] * 30 +
                                        (int)$bookingInfo['seats_BC'] * 30;
                                } else {
                                    echo
                                        (int)$bookingInfo['seats_SF'] * 12.50 +
                                        (int)$bookingInfo['seats_SP'] * 10.50 +
                                        (int)$bookingInfo['seats_SC'] * 8.50 +
                                        (int)$bookingInfo['seats_FF'] * 25 +
                                        (int)$bookingInfo['seats_FC'] * 20 +
                                        (int)$bookingInfo['seats_BA'] * 22 +
                                        (int)$bookingInfo['seats_BF'] * 20 +
                                        (int)$bookingInfo['seats_BC'] * 20;
                                }
                                ?></td>
                        </tr>

                    </table>
                </fieldset>
                <!--Print Standard Full Tickets-->
                <?php for ($i = 0; $i < $bookingInfo['seats_SF']; $i++) { ?>
                    <fieldset>
                        <table style="width: 100%; height: 200px">
                            <tr>
                                <td style="float: left;">Silverado</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo sessionToString($bookingInfo['session']); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['movie']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: bottom;">Standard (Full)</td>
                                <td style="float: right;"><img src="logo_small.png" alt="Print Error" /><<img src="barcode.jpg" alt="Print Error" /></td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>
                <!--Print Standard Consession Tickets-->
                <?php for ($i = 0; $i < $bookingInfo['seats_SP']; $i++) { ?>
                    <fieldset>
                        <table style="width: 100%;">
                            <tr>
                                <td style="float: left;">Silverado</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo sessionToString($bookingInfo['session']); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['movie']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: bottom;">Standard (Conession)</td>
                                <td style="float: right;"><img src="logo_small.png" alt="Print Error" /><<img src="barcode.jpg" alt="Print Error" /></td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>
                <!--Print Standard Child Tickets-->
                <?php for ($i = 0; $i < $bookingInfo['seats_SC']; $i++) { ?>
                    <fieldset>
                        <table style="width: 100%;">
                            <tr>
                                <td style="float: left;">Silverado</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo sessionToString($bookingInfo['session']); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['movie']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: bottom;">Standard (Child)</td>
                                <td style="float: right;"><img src="logo_small.png" alt="Print Error" /><<img src="barcode.jpg" alt="Print Error" /></td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>
                <!--Print FirstClass Adult Tickets-->
                <?php for ($i = 0; $i < $bookingInfo['seats_FF']; $i++) { ?>
                    <fieldset>
                        <table style="width: 100%;">
                            <tr>
                                <td style="float: left;">Silverado</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo sessionToString($bookingInfo['session']); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['movie']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: bottom;">First Class (Adult)</td>
                                <td style="float: right;"><img src="logo_small.png" alt="Print Error" /><<img src="barcode.jpg" alt="Print Error" /></td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>
                <!--Print FirstClass Child Tickets-->
                <?php for ($i = 0; $i < $bookingInfo['seats_FC']; $i++) { ?>
                    <fieldset>
                        <table style="width: 100%;">
                            <tr>
                                <td style="float: left;">Silverado</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo sessionToString($bookingInfo['session']); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['movie']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: bottom;">First Class (Child)</td>
                                <td style="float: right;"><img src="logo_small.png" alt="Print Error" /><<img src="barcode.jpg" alt="Print Error" /></td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>
                <!--Print Beanbag Adult Tickets-->
                <?php for ($i = 0; $i < $bookingInfo['seats_BA']; $i++) { ?>
                    <fieldset>
                        <table style="width: 100%;">
                            <tr>
                                <td style="float: left;">Silverado</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo sessionToString($bookingInfo['session']); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['movie']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: bottom;">Beanbag (Adult)</td>
                                <td style="float: right;"><img src="logo_small.png" alt="Print Error" /><<img src="barcode.jpg" alt="Print Error" /></td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>
                <!--Print Beanbag Family Tickets-->
                <?php for ($i = 0; $i < $bookingInfo['seats_BF']; $i++) { ?>
                    <fieldset>
                        <table style="width: 100%;">
                            <tr>
                                <td style="float: left;">Silverado</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo sessionToString($bookingInfo['session']); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['movie']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: bottom;">Beanbag (Family)</td>
                                <td style="float: right;"><img src="logo_small.png" alt="Print Error" /><<img src="barcode.jpg" alt="Print Error" /></td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>
                <!--Print Beanbag Child Tickets-->
                <?php for ($i = 0; $i < $bookingInfo['seats_BC']; $i++) { ?>
                    <fieldset>
                        <table style="width: 100%;">
                            <tr>
                                <td style="float: left;">Silverado</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo sessionToString($bookingInfo['session']); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="float: left;"><?php echo $bookingInfo['movie']; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: bottom;">Beanbag (Child)</td>
                                <td style="float: right;"><img src="logo_small.png" alt="Print Error" /><<img src="barcode.jpg" alt="Print Error" /></td>
                            </tr>
                        </table>
                    </fieldset>
                <?php } ?>

                <br><br><br>

                <?php
            }
        }
        ?>
    </div>
</main>
<footer>
    <div id="centre" class="hide-on-print">
        <p style="color: white">Kieran Murray s3660898 &amp Will Cohen s3660898</p>
    </div>
</footer>
<div class="hide-on-print"><?php include_once("debug.php"); ?></div>
</body>
</html>

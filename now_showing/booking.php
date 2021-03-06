<?php
  session_start();

  $grandTotal = 0;

  if(isset($_POST['submit'])){
    if(!($_POST['movie'] == 'Please select...' || $_POST['session'] == 'Please select...')){
      $bookingInfo = array(
                            'movie'    => $_POST['movie'],
                            'session'  => $_POST['session'],
                            'seats_SF' => $_POST['seats_SF'],
                            'seats_SP' => $_POST['seats_SP'],
                            'seats_SC' => $_POST['seats_SC'],
                            'seats_FF' => $_POST['seats_FF'],
                            'seats_FC' => $_POST['seats_FC'],
                            'seats_BA' => $_POST['seats_BA'],
                            'seats_BF' => $_POST['seats_BF'],
                            'seats_BC' => $_POST['seats_BC']);
      //Appropriate movie names
      switch ($bookingInfo['movie']){
        case 'CH':
          $bookingInfo['movie'] = 'The Emoji Movie (G)';
          break;
        case 'AF':
          $bookingInfo['movie'] = 'The Square (R)';
          break;
        case 'RC':
          $bookingInfo['movie'] = 'The Big Sick (R)';
          break;
        case 'AC':
          $bookingInfo['movie'] = 'Baby Driver (R)';
          break;
      }

        if (!isset($_SESSION['bookingList'])) {
            $_SESSION['bookingList'] = array();
        }
        array_push($_SESSION['bookingList'],$bookingInfo);
    }

  }
  //Cart clearing
  if(isset($_POST['clearCart'])){
    unset($_SESSION['bookingList']);
    unset($grandTotal);
  }


  function sessionToString($session) {
      switch ($session) {
          case "MON-1": return "Monday - 1pm";
          case "MON-6": return "Monday - 6pm";
          case "MON-9": return "Monday - 9pm";

          case "TUES-1": return "Tuesday - 1pm";
          case "TUES-6": return "Tuesday - 6pm";
          case "TUES-9": return "Tuesday - 9pm";

          case "WED-1": return "Wednesday - 1pm";
          case "WED-6": return "Wednesday - 6pm";
          case "WED-9": return "Wednesday - 9pm";

          case "THUR-1": return "Thursday - 1pm";
          case "THUR-6": return "Thursday - 6pm";
          case "THUR-9": return "Thursday - 9pm";

          case "FRI-1": return "Friday - 1pm";
          case "FRI-6": return "Friday - 6pm";
          case "FRI-9": return "Friday - 9pm";

          case "SAT-12": return "Saturday - 12pm";
          case "SAT-3": return "Saturday - 3pm";
          case "SAT-6": return "Saturday - 6pm";
          case "SAT-9": return "Saturday - 9pm";

          case "SUN-12": return "Sunday - 12pm";
          case "SUN-3": return "Sunday - 3pm";
          case "SUN-6": return "Sunday - 6pm";
          case "SUN-9": return "Sunday - 9pm";

          default: return "ERROR";
      }
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"/>
    <link rel="stylesheet" href="../wip.css"/>
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="../">Home</a></li>
        <li><a href="index.php">Now Showing</a></li>
        <li><a class="active "href="">View Cart</a></li>
        <li><a href="../about">About</a></li>
      </ul>
    </nav>
    <br><br><br><br><br><br>
    <header>
    </header>
    <main>
      <div id="centre">
        <?php if(isset($_SESSION['bookingList'])){
          echo '<h2>Your Cart:</h2><br>';
          foreach($_SESSION['bookingList'] as $bookingInfo){?>
            <fieldset>
              <h2><?php echo $bookingInfo['movie'];?></h2>
              <p>Showing at <?php echo sessionToString($bookingInfo['session']);?></p>
              <table>
                <tr>
                  <th>Ticket Type</th>
                  <th>Cost</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
                </tr>
                <?php if($bookingInfo['seats_SF'] != 0){?>
                  <tr>
                    <td>Standard (Full)</td>
                    <td><?php echo '$18.50';?></td>
                    <td><?php echo $bookingInfo['seats_SF'];?></td>
                    <td><?php echo '$'.(int)$bookingInfo['seats_SF']*18.50;?></td>
                  </tr>
                <?php }?>
                <?php if($bookingInfo['seats_SP'] != 0){?>
                  <tr>
                    <td>Standard (Concession)</td>
                    <td><?php echo '$15.50';?></td>
                    <td><?php echo $bookingInfo['seats_SP'];?></td>
                    <td><?php echo '$'.(int)$bookingInfo['seats_SP']*15.50;?></td>
                  </tr>
                <?php }?>
                <?php if($bookingInfo['seats_SC'] != 0){?>
                  <tr>
                    <td>Standard (Child)</td>
                    <td><?php echo '$12.50';?></td>
                    <td><?php echo $bookingInfo['seats_SC'];?></td>
                    <td><?php echo '$'.(int)$bookingInfo['seats_SC']*12.50;?></td>
                  </tr>
                <?php }?>
                <?php if($bookingInfo['seats_FF'] != 0){?>
                  <tr>
                    <td>First Class (Full)</td>
                    <td><?php echo '$30.00';?></td>
                    <td><?php echo $bookingInfo['seats_FF'];?></td>
                    <td><?php echo '$'.(int)$bookingInfo['seats_FF']*30;?></td>
                  </tr>
                <?php }?>
                <?php if($bookingInfo['seats_FC'] != 0){?>
                  <tr>
                    <td>First Class (Child)</td>
                    <td><?php echo '$25.00';?></td>
                    <td><?php echo $bookingInfo['seats_FC'];?></td>
                    <td><?php echo '$'.(int)$bookingInfo['seats_FC']*25;?></td>
                  </tr>
                <?php }?>
                <?php if($bookingInfo['seats_BA'] != 0){?>
                  <tr>
                    <td>Beanbag (Adult)</td>
                    <td><?php echo '$33.00';?></td>
                    <td><?php echo $bookingInfo['seats_BA'];?></td>
                    <td><?php echo '$'.(int)$bookingInfo['seats_BA']*33;?></td>
                  </tr>
                <?php }?>
                <?php if($bookingInfo['seats_BF'] != 0){?>
                  <tr>
                    <td>Beanbag (Family)</td>
                    <td><?php echo '$30.00';?></td>
                    <td><?php echo $bookingInfo['seats_BF'];?></td>
                    <td><?php echo '$'.(int)$bookingInfo['seats_BF']*30;?></td>
                  </tr>
                <?php }?>
                <?php if($bookingInfo['seats_BC'] != 0){?>
                  <tr>
                    <td>Beanbag (Child)</td>
                    <td><?php echo '$30.00';?></td>
                    <td><?php echo $bookingInfo['seats_BC'];?></td>
                    <td><?php echo '$'.(int)$bookingInfo['seats_BC']*30;?></td>
                  </tr>
                <?php }?>
                <tr>
                  <td></td>
                  <td></td>
                  <td>Total:</td>
                  <td>
                    <?php $grandTotal +=
                    (int)$bookingInfo['seats_SF']*18.50+
                    (int)$bookingInfo['seats_SP']*15.50+
                    (int)$bookingInfo['seats_SC']*12.50+
                    (int)$bookingInfo['seats_FF']*30+
                    (int)$bookingInfo['seats_FC']*25+
                    (int)$bookingInfo['seats_BA']*33+
                    (int)$bookingInfo['seats_BF']*30+
                    (int)$bookingInfo['seats_BC']*30;
                    echo '$';
                    echo
                    (int)$bookingInfo['seats_SF']*18.50+
                    (int)$bookingInfo['seats_SP']*15.50+
                    (int)$bookingInfo['seats_SC']*12.50+
                    (int)$bookingInfo['seats_FF']*30+
                    (int)$bookingInfo['seats_FC']*25+
                    (int)$bookingInfo['seats_BA']*33+
                    (int)$bookingInfo['seats_BF']*30+
                    (int)$bookingInfo['seats_BC']*30;?>
                  </td>
                </tr>
              </table>
            </fieldset>
          <?php }?>
          <?php echo '<h3>Grand Total: $'.$grandTotal.'</h3>';?>
          <form method="post" action="booking.php">
            <button class="submit" name="clearCart">Clear Cart</button>
          </form>
          <form action ="index.php">
            <button>Continue Shopping</button>
          </form>
        <?php }else{?>
          <h2>Your cart is empty!<h2>
        <?php }?>
      </div>
    </main>
    <footer>
      <div id="centre">
        <p style="color: white">Kieran Murray s3660898 &amp Will Cohen s3660898</p>
      </div>
    </footer>
    <?php include_once("../debug.php"); ?>
  </body>
</html>

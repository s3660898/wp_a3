<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Now Showing</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"/>
    <link rel="stylesheet" href="../wip.css"/>
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="../">Home</a></li>
        <li><a class="active" href="">Now Showing</a></li>
        <li><a href="../now_showing/booking.php">View Cart</a></li>
        <li><a href="../about">About</a></li>
      </ul>
    </nav>
    <br><br><br><br><br><br>
    <header>
    </header>
    <main>
      <div id="centre">
        <h2>Now Showing:</h2>
        <br>
        <div class="container">
            <div class="column">
                <!-- Action Movie -->
                <img src="movie_icons/BabyDriver.jpg" alt="Baby Driver"/>
                <h2>Baby Driver</h2>
                <h3>Showing:</h3>
                <p>N/A</p>
                <p>N/A</p>
                <p>Wednesdays 9:00pm</p>
                <p>Thursdays 9:00pm</p>
                <p>Fridays 9:00pm</p>
                <p>Saturday 9:00pm</p>
                <p>Sunday 9:00pm</p>
            </div>
            <div class="column">
                <!-- Kids' Movie -->
                <img src="movie_icons/TheEmojiMovie.jpg" alt="The Emoji Movie"/>
                <h2>The Emoji Movie</h2>
                <h3>Showing:</h3>
                <p>Monday 1:00pm</p>
                <p>Tuesday 1:00pm</p>
                <p>Wednesday 6:00pm</p>
                <p>Thursday 6:00pm</p>
                <p>Friday 6:00pm</p>
                <p>Saturday 12:00pm</p>
                <p>Saturday 12:00pm</p>
            </div>
            <div class="column">
                <!-- Art/Foreign Movie-->
                <img src="movie_icons/TheSquare.jpg" alt="The Square"/>
                <h2>The Square</h2>
                <h3>Showing:</h3>
                <p>Monday 6:00pm</p>
                <p>Tuesday 6:00pm</p>
                <p>N/A</p>
                <p>N/A</p>
                <p>N/A</p>
                <p>Saturday 3:00pm</p>
                <p>Saturday 3:00pm</p>
            </div>
            <div class="column">
                <!-- Romantic Comedy Movie -->
                <img src="movie_icons/TheBigSick.jpg" alt="The Big Sick"/>
                <h2>The Big Sick</h2>
                <h3>Showing:</h3>
                <p>Monday 9:00pm</p>
                <p>Tuesday 9:00pm</p>
                <p>Wednesday 1:00pm</p>
                <p>Thursday 1:00pm</p>
                <p>Friday 1:00pm</p>
                <p>Saturday 6:00pm</p>
                <p>Saturday 6:00pm</p>
            </div>
        </div>
      </div>
      <div id="centre" class="form">
        <h2>Book Now:</h2>
        <br>
        <form method="post" action="booking.php">
          <label>Movie</label><select name="movie">
            <option value="">Please select...</option>
            <option value="CH">The Emoji Movie</option>
            <option value="AF">The Square</option>
            <option value="RC">The Big Sick</option>
            <option value="AC">Baby Driver</option>
          </select>
          <p><label>Session</label><select name="session">
                <option value="">Please select...</option>
                <option value="MON-1">Monday - Tuesday: 1pm</option>
                <option value="MON-6">Monday - Tuesday: 6pm</option>
                <option value="MON-9">Monday - Tuesday: 9pm</option>
                <option value="WED-1">Wednesday - Friday: 1pm</option>
                <option value="WED-6">Wednesday - Friday: 6pm</option>
                <option value="WED-9">Wednesday - Friday: 9pm</option>
                <option value="SAT-12">Saturday - Sunday: 12pm</option>
                <option value="SAT-3">Saturday - Sunday: 3pm</option>
                <option value="SAT-6">Saturday - Sunday: 6pm</option>
                <option value="SAT-9">Saturday - Sunday: 9pm</option>
            </select></p>
            <fieldset><legend>Seats</legend>
                <fieldset><legend>Standard</legend>
                    <p><label>Adult - $12.50</label>
                        <select name="seats_SF">
                            <option value="0"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select></p>
                    <p><label>Concession $10.50</label><select name="seats_SP">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select></p>
                    <p><label>Child - $8.50</label><select name="seats_SC">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select></p>
                </fieldset>
                <fieldset><legend>First Class</legend>
                    <p><label>Adult - $25</label><select name="seats_FF">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select></p>
                    <p><label>Child - $20</label><select name="seats_FC">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select></p>
                </fieldset>
                <fieldset><legend>Bean Bags</legend>
                    <p><label>Adult - $22</label><select name="seats_BA">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select></p>
                    <p><label>Family - $20</label><select name="seats_BF">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select></p>
                    <p><label>Child - $20</label><select name="seats_BC">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select></p>
                </fieldset>
            </fieldset>
          <button class="submit" name="submit">Add to cart</button>
        </form>
      </div>
    </main>
    <footer>
      <div id="centre">
        <p style="color: white">Kieran Murray s3660898 &amp Will Cohen s3660898</p>
      </div>
    </footer>
    <?php include_once("/home/eh1/e54061/public_html/wp/debug.php"); ?>
  </body>
</html>

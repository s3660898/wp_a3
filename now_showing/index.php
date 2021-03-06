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
                <p>Sunday 12:00pm</p>
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
                <p>Sunday 3:00pm</p>
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
                <p>Sunday 6:00pm</p>
            </div>
        </div>
      </div>
      <div id="centre" class="form">
        <h2>Book Now:</h2>
        <br>
        <form method="post" action="booking.php">
          <label>Movie</label><select id="movieSelect" onchange="showSessions()">
            <option value="">Please select...</option>
            <option value="CH">The Emoji Movie</option>
            <option value="AF">The Square</option>
            <option value="RC">The Big Sick</option>
            <option value="AC">Baby Driver</option>
          </select>
            <input type="hidden" id="movieData" name="movie" value=""/>
            <script>
                function showSessions() {
                    var select = document.getElementById("sessionSelect");
                    var movie = document.getElementById("movieSelect");

                    document.getElementById("movieData").value = movie.value;

                    select.style.display = "block";

                    var length = select.options.length;

                    for (i = 0; i < length; i++) {
                        select.options.remove(i);
                    }

                    time = document.createElement("option");
                    time.text = "Please select...";
                    time.value = "";
                    select.options.add(time);

                    var time;
                    switch (movie.value) {
                        case "CH":
                            time = document.createElement("option");
                            time.text = "Monday - 1pm";
                            time.value = "MON-1";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Tuesday - 1pm";
                            time.value = "TUES-1";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Wednesday - 6pm";
                            time.value = "WED-6";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Thursday - 6pm";
                            time.value = "THUR-6";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Friday - 6pm";
                            time.value = "FRI-6";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Saturday - 12pm";
                            time.value = "SAT-12";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Sunday - 12pm";
                            time.value = "SUN-12";
                            select.options.add(time);

                            break;
                        case "AF":
                            time = document.createElement("option");
                            time.text = "Monday - 6pm";
                            time.value = "MON-6";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Tuesday - 6pm";
                            time.value = "TUES-6";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Saturday - 3pm";
                            time.value = "SAT-3";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Sunday - 3pm";
                            time.value = "SUN-3";
                            select.options.add(time);
                            break;
                        case "AC":
                            time = document.createElement("option");
                            time.text = "Wednesday - 9pm";
                            time.value = "WED-9";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Thursday - 9pm";
                            time.value = "THUR-9";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Friday - 9pm";
                            time.value = "FRI-9";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Saturday - 9pm";
                            time.value = "SAT-9";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Sunday - 9pm";
                            time.value = "SUN-9";
                            select.options.add(time);
                            break;
                        case "RC":
                            time = document.createElement("option");
                            time.text = "Monday - 9pm";
                            time.value = "MON-9";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Tuesday - 9pm";
                            time.value = "TUES-9";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Wednesday - 1pm";
                            time.value = "WED-1";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Thursday - 1pm";
                            time.value = "THUR-1";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Friday - 1pm";
                            time.value = "FRI-1";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Saturday - 6pm";
                            time.value = "SAT-6";
                            select.options.add(time);

                            time = document.createElement("option");
                            time.text = "Sunday - 6pm";
                            time.value = "SUN-6";
                            select.options.add(time);
                            break;

                    }

                    movie.disabled = true;
                }
            </script>
          <p><label>Session</label><select id="sessionSelect" name="session" style="display: none" onchange="showSeats()">
            </select></p>
            <input type="hidden" id="sessionData" name="session" value="" />
            <script>
                function showSeats() {
                    var session = document.getElementById("sessionSelect");

                    document.getElementById("sessionData").value = session.value;

                    session.disabled = true;

                    var seats = document.getElementById("seatsSelect");
                    seats.style.display = "block";
                }
            </script>
            <fieldset id="seatsSelect" style="display: none"><legend>Seats</legend>
                <fieldset><legend>Standard</legend>
                    <p><label>Adult - $12.50</label>
                        <select name="seats_SF" onchange="showAddButton()">
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
                    <p><label>Concession $10.50</label><select name="seats_SP" onchange="showAddButton()">
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
                    <p><label>Child - $8.50</label><select name="seats_SC" onchange="showAddButton()">
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
                    <p><label>Adult - $25</label><select name="seats_FF" onchange="showAddButton()">
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
                    <p><label>Child - $20</label><select name="seats_FC" onchange="showAddButton()">
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
                    <p><label>Adult - $22</label><select name="seats_BA" onchange="showAddButton()">
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
                    <p><label>Family - $20</label><select name="seats_BF" onchange="showAddButton()">
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
                    <p><label>Child - $20</label><select name="seats_BC" onchange="showAddButton()">
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
                    <script>
                        function showAddButton() {
                            document.getElementById("submitButton").style.display = "block";
                        }
                    </script>
                </fieldset>
            </fieldset>
          <button class="submit" id="submitButton" name="submit" style="display: none">Add to cart</button>
        </form>
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

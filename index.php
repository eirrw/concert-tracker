<?php
/**
 * User: Erik Wilson
 * Date: 13-Apr-17
 * Time: 21:23
 */
require_once '_functions.php';
check_install();

//require the config file
require_once "config.php";

// start the session and connect to DB
session_start();
$dbh = db_connect() or die(ERR_MSG);

$pageTitle = "Concert Tracker";

ob_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <!-- Include the HTML head -->
    <?php include "htmlhead.php" ?>
    <body>
    <header>
        <?php
        include "navbar.php";
        echo $navbar;
        ?>
    </header>

    <main class="container head-foot-spacing">
        <h3>Next show:</h3>

        <div class="jumbotron">
            <?php
            $date = date("Y-m-d");
            $result = $dbh->query("SELECT name, city, date, notes, genre, country FROM concert, artist WHERE date >= '$date' AND attend = 1 AND concert.artist = artist.artist_id ORDER BY date LIMIT 1");
            $result = $result->fetch(PDO::FETCH_ASSOC);
            if ($result != false) {
                ?>
                <h1><?php echo $result['name'] ?>
                    <small> <?php echo date("D, d M Y",
                            strtotime($result['date'])) ?></small>
                </h1>
                <h3>Concert Info:</h3>
                <ul>
                    <li><?php echo $result['city'] ?></li>
                    <li><?php echo $result['notes'] ?></li>
                </ul>
                <h3>Artist Info:</h3>
                <ul>
                    <li><?php echo $result['country'] ?></li>
                    <li><?php echo $result['genre'] ?></li>
                </ul>
                <?php
            } else {
                echo "<h2>Not attending any concerts</h2>";
                echo "<p>Check the concerts page for upcoming shows!</p>";
            }
            ?>
        </div>
        <!-- Upcoming? -->
    </main>

    <!-- Simple footer -->
    <?php
    include 'footer.php';
    echo $footer;
    ?>
    
    <script>
        // Handle navbar dynamic highlighting
        $(document).ready(function () {
            // get current URL path and assign 'active' class to navbar
            var pathname = new URL(window.location.href).pathname.split('/').pop();
            if (pathname !== "") {
                $('.nav > li > a[href="' + pathname + '"]').parent().addClass('active');
            }
        })
    </script>
    </body>
    </html>
<?php
ob_end_flush();

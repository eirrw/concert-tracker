<?php
/**
 * User: Erik Wilson
 * Date: 16-Apr-17
 * Time: 00:16
 */
// check if program is installed
if ( !file_exists('config.php')) {
    die("Please run the <a href='install.php'>install script</a> set up Concert Tracker.");
}

//require the config file
require_once "config.php";

// start the session and connect to DB
session_start();

$pageTitle = "Import Data - Concert Tracker";
?>
<!DOCTYPE html>
<html lang="en">
<!-- Include the HTML head -->
<? include "template/htmlhead.php" ?>
<body>
<header>
    <? include "template/navbar.php" ?>
</header>

<main class="container head-foot-spacing">
    <form class="container panel form-upload panel-default"
          action="logic/import-csv.php"
          method="post" enctype="multipart/form-data">
        <h2>Import Data</h2>
        <hr>
        <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="filetype" value="artist" required>
                    Artist Data
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="filetype" value="concert" disabled>
                    Concert Data
                </label>
            </div>
        </div>
        <!--        <hr>-->
        <div class="form-group">
            <label for="file-upload">Upload CSV</label>
            <input type="file" id="file-upload" name="csvfile" required>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" value="" name="headers">
                My data has headers
            </label>
        </div>
        <hr>
        <button type="submit" class="btn btn-default" name="filesubmit">
            Submit
        </button>
    </form>
</main>

<!-- Simple footer -->
<footer class="panel-footer navbar-fixed-bottom">
    <div class="container">
        <p class="text-center">Built by Erik Wilson</p>
    </div>
</footer>

<script>
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
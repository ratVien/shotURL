<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 23.11.2015
 * Time: 21:36
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>URL Shortener</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <meta charset="UTF-8">
    <style>
        .bt {
            border-top: 1px solid;
        }
        .ar {
            text-align: right;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="jumbotron">
        <h2><a href="index.php">URL Shortener</a></h2>

        <p>Shorten and share your shortened URLs.</p>
    </div>
    <div class="row">
        <form role="form" action="javascript:shortUrl()">
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="longurl">Long URL</label>

                    <div class="input-group">
                        <input id="longurl" class="form-control" type="url" placeholder="Enter long URL">
                                    <span class="input-group-btn">
                                    <button id="shorten" class="btn btn-default" type="submit">Do!</button>
                                    </span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="result">Short URL</label>
                    <span class="form-control" id="result"></span>
                </div>
            </div>
        </form>
    </div>
    <br>

    <div class="row bt">
        <br>
        <?
        date_default_timezone_set('America/Los_Angeles');
        ?>
        &copy; <?= date('Y'); ?> URL Shortener by Ivan Laloff
        <br>
    </div>
</div>
<script>
    function shortUrl() {
        var url = document.getElementById("longurl").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (url.length == 0) {
                document.getElementById("result").innerHTML = 'Enter URL!';
                return;
            }
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("result").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", "short.php?url=" + url, true);
        xhttp.send();
    }
</script>
</body>
</html>

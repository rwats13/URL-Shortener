<!-- Redirecting the user to their original link using shortened link -->
<?php 
    if (isset($_GET['u'])) {
        include "php/config.php";
        $u = mysqli_real_escape_string($conn, $_GET['u']);

        // Getting the full URL of the short URL
        $sql = mysqli_query($conn, "SELECT full_url FROM url where shorten_url = '{$u}'");
        if (mysqli_num_rows($sql) > 0) {
            $full_url = mysqli_fetch_assoc($sql);
            header("Location:" . $full_url['full_url']);
        }
    }
    
?>


<!DOCTYPE html>
<!-- URL Shortener Web Application by Reece Watson - Tutorial by CodingNepal 
    (youtube.com/codingnepal) -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <title>Reece's URL Shortener</title>
</head>
<body>
    <!-- <div class="heading">
        <h1>Reece's URL Shortener</h1>
    </div> -->
    <div class="wrapper">
        <form action="#">
            <input type="text" name="full-url" placeholder="Enter or paste your URL here" required>
            <i class="url-icon uil uil-link"></i>
            <button>Shorten</button>
        </form>
        <div class="count">
            <span>
                Total Links: <span>10</span> & Total Clicks: <span>140</span>
            </span>
            <a href="#">Clear All</a>
        </div>
        <div class="urls-area">
            <div class="title">
                <li>Shorten URL</li>
                <li>Original URL</li>
                <li>Clicks</li>
                <li>Action</li>
            </div>
            <div class="data">
                <li><a href="#">example.com/123abc</a></li>
                <li>https://www.codingnepalweb.com/p/about-us.html</li>
                <li>20</li>
                <li><a href="#">Delete</a></li>
            </div>
            <div class="data">
                <li><a href="#">example.com/123abc</a></li>
                <li>www.example.com/test/example/12345abcedf?test=yes</li>
                <li>20</li>
                <li><a href="#">Delete</a></li>
            </div>
            <div class="data">
                <li><a href="#">example.com/123abc</a></li>
                <li>www.example.com/test/example/12345abcedf?test=yes</li>
                <li>20</li>
                <li><a href="#">Delete</a></li>
            </div>
            <div class="data">
                <li><a href="#">example.com/123abc</a></li>
                <li>www.example.com/test/example/12345abcedf?test=yes</li>
                <li>20</li>
                <li><a href="#">Delete</a></li>
            </div>
            <div class="data">
                <li><a href="#">example.com/123abc</a></li>
                <li>www.example.com/test/example/12345abcedf?test=yes</li>
                <li>20</li>
                <li><a href="#">Delete</a></li>
            </div>
            <div class="data">
                <li><a href="#">example.com/123abc</a></li>
                <li>www.example.com/test/example/12345abcedf?test=yes</li>
                <li>20</li>
                <li><a href="#">Delete</a></li>
            </div>
            <div class="data">
                <li><a href="#">example.com/123abc</a></li>
                <li>www.example.com/test/example/12345abcedf?test=yes</li>
                <li>20</li>
                <li><a href="#">Delete</a></li>
            </div>
            <div class="data">
                <li><a href="#">example.com/123abc</a></li>
                <li>www.example.com/test/example/12345abcedf?test=yes</li>
                <li>20</li>
                <li><a href="#">Delete</a></li>
            </div>
        </div>
    </div>

    <div class="blur-effect"></div>
    <div class="popup-box">
        <div class="info-box">
            Your shortened link is ready! You can also edit your short link now, but you'll be unable to edit once it is saved.
        </div>
        <form action="#">
            <label>Edit your shortened URL</label>
            <input type="text" spellcheck="false" value="">
            <i class="copy-icon uil uil-copy-alt"></i>
            <button>Save</button>
        </form>
    </div>

    <script src="script.js"></script>

</body>
</html>
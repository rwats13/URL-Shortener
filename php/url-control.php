<?php
    include "config.php";
    // Gets the value which is sent from script.js AJAX
    $full_url = mysqli_real_escape_string($conn, $_POST['full-url']);

    // If the URL input is not empty, and the inputted URL is a valid URL:
    if (!empty($full_url) && filter_var($full_url, FILTER_VALIDATE_URL)) {
        $ran_url = substr(md5(microtime()), rand(0, 26), 5);    // Generates a random 5-char URL
        
        // Checking if the randomly-generated URL already exists in the database:
        $sql = mysqli_query($conn, "SELECT shorten_url FROM url WHERE shorten_url = '{$ran_url}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "Something went wrong. Please try again.";
        } else {
            $sql2 = mysqli_query($conn, "INSERT INTO url (shorten_url, full_url, clicks)
                                         VALUES ('{$ran_url}', '{$full_url}', '0')");
            if ($sql2) {
                // If data inserted successfully:
                $sql3 = mysqli_query($conn, "SELECT shorten_url FROM url WHERE shorten_url = '{$ran_url}'");
                if (mysqli_num_rows($sql3) > 0) {
                    $shorten_url = mysqli_fetch_assoc($sql3);
                    echo $shorten_url['shorten_url'];
                }
            } else {
                echo "Something went wrong. Please try again.";
            }
        }
    } else {
        echo "$full_url - This is not a valid URL.";
    }
?>
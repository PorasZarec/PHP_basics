<?php
// THIS PHP FILE TAKES CARE OF SHOWING INFORMATION INSIDE THE WEBSITE

declare(strict_types=1);

function signup_input() {
    // Debugging statements
    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';

    // Username input
    if (isset($_SESSION['signup_data']['username']) && !isset($_SESSION['errors_signup']['username_taken'])) {
        echo '<input type="text" name="username" placeholder="Username" value="' . ($_SESSION['signup_data']['username']) . '">';
    } else {
        echo '<input type="text" name="username" placeholder="Username">';
    }


    echo '<input type="password" name="pwd" placeholder="Password">';


    // Email input
    if (isset($_SESSION['signup_data']["email"]) && 
        !isset($_SESSION['errors_signup']["email_used"]) && 
        !isset($_SESSION['errors_signup']["invalid_email"])) {
        echo '<input type="text" name="email" placeholder="E-mail" value="' . $_SESSION['signup_data']['email'] . '">';
    } else {
        echo '<input type="text" name="email" placeholder="E-mail">';
    }
}

function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        // THIS WILL DISPLAY ALL THE ERRORS
        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    }
    else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>';
        echo '<p class="form-success">Sign up successful!</p>';
    }
}
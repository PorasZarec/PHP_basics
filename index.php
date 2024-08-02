<?php
    require_once "include/config_session.inc.php";
    require_once "include/signup_view.inc.php";
    require_once "include/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Login and Signup</title>
</head>
<body>
    <h3>
        <?php
        output_username();
        ?>
    </h3>

    <?php
        if (!isset($_SESSION["user_id"])){ ?>

        <h3>Login</h3>
        <form action="include/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button>Login</button>
        </form>
    
    <?php } ?>

    <?php
        check_login_errors();
    ?>

    <h3>Signup</h3>
    <form action="include/signup.inc.php" method="post">
        <?php
            signup_input();
        ?>
        <button>Signup</button>
    </form>

    <?php
        check_signup_errors();
    ?>

    <h3>Logout</h3>

    <form action="include/logout.inc.php" method="post">
        <button>Logout</button>
    </form>

</body>
</html>
<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION["last_regenerated"])) {
        regenerate_session_loggedin();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION['last_regenerated'] > $interval) {
            regenerate_session_loggedin();
        }
    }
} else {
    if (!isset($_SESSION["last_regenerated"])) {
        regenerate_session_id();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION['last_regenerated'] > $interval) {
            regenerate_session_id();
        }
    }
}

/*
 * Regenerates the session ID and updates the last regenerated timestamp in the session.
*/
function regenerate_session_id() {
    session_regenerate_id(true);

    // Assuming user_id might not be set initially
    $userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : '';

    // Only set a custom session ID if user_id is available
    if ($userId) {
        $userId = $_SESSION["user_id"];
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "-" . $userId;
        session_id($sessionId); 
    }

    $_SESSION['last_regenerated'] = time();
}

function regenerate_session_loggedin() {
    session_regenerate_id(true);
    $_SESSION['last_regenerated'] = time();
}

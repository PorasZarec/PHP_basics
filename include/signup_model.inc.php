<?php

declare(strict_types=1);

function get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM users WHERE username = :username";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":username", $username);
    $statement->execute();
}
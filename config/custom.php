<?php

$host = "https://bbi-production.up.railway.app/";

return [
    "routes" => [
        "auth_login" => $host . "auth/login",
        "auth_google_login" => $host . "auth/google/login",
        "auth_register" => $host . "auth/register",
        "auth_google_logout" => $host . "auth/google/logout",
        "annonces_create" => $host . "annonces/create",

    ],
    "session" => [
        "userId" => "user_id",
        "token" => "token",
    ]
];


<?php

function isValid($message)
{
    $errors = [];

    if (empty($message->email)) {
        $errors[1] = "Email field can not be empty.";
    } elseif (!filter_var($message->email, FILTER_VALIDATE_EMAIL)) {
        $errors[1] = "Invalid email address.";
    }

    if (empty($message->name)) {
        $errors[2] = "Name field can not be empty.";
    }

    if (empty($message->body)) {
        $errors[3] = "Message field can not be empty.";
    }

    return $errors ? $errors : false;
}

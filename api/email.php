<?php

require_once '../SunMailer/autoload.php';
require_once '../inc/validation.php';
require_once '../inc/requestchecker.php';

use SunMailer\Mailer;

if (!isAjax()) {
    Header('Location: /');
    exit;
}

$request_body = file_get_contents('php://input');
$message = json_decode($request_body);

$errors = isValid($message);

if ($errors) {
    http_response_code(403);
    echo json_encode($errors);return;
}

if (Mailer::send($message->email, $message->name, 'From Contact Form', $message->body)) {
    echo 'Your message has been send successfully.';
}

<?php

require_once '../SunMailer/autoload.php';
require_once '../inc/validation.php';
require_once '../inc/requestchecker.php';

use SunMailer\Helper;
use SunMailer\Mailer;
use SunMailer\View;

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

$config = require Helper::config() . '';

$view = View::render('template', [
    'email' => $message->email,
    'name' => $message->name,
    'message' => $message->body
]);

if (Mailer::send($config['mail']['username'], $config['mail']['username'], 'From Contact Form', $view)) {
    echo 'Your message has been send successfully.';
}

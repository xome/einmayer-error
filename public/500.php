<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fehler bei Verarbeitung</title>
</head>
<body>

<p>Entschuldigung, da ist ein Fehler passiert.<br>
Der Admin wurde kontaktiert.<br>
Es gibt keinen Handlungsbedarf.</p>

<p>Sorry, there has been an error.<br>
The admin has been contacted.<br>
There is nothing to do.</p>

<?php

require_once "Constants.php";
$lastError = error_get_last();
if (isset($lastError) && array_key_exists('message', $lastError)) {
    $errorMessage = $lastError["message"];
} else {
    $errorMessage = "No error message.";
}

$message = 'Woops! Da ist ein Fehler bei einmayer.de passiert:' . PHP_EOL .
    'PID: ' . getmypid() . PHP_EOL .
    'Remote Address: ' . $_SERVER['REMOTE_ADDR'] . PHP_EOL .
    'Date: ' . date('c') . PHP_EOL .
    'Last Error: ' . $errorMessage;

mail(Constants::WEBMASTER_MAIL,
    'Laufzeitfehler auf ' . Constants::DOMAIN,
    $message) ?>
</body>
</html>
<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

# Start our TwiML response
$response = new Twilio\TwiML();

# Use <Record> to record the caller's message
$response->record();

# End the call with <Hangup>
$response->hangup();

echo $response;

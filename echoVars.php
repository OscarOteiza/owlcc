<?php
echo "---------------------------------------";
echo "\xA+++ Echo environment variables and test the environment.";
//
$account_sid = getenv("ACCOUNT_SID");
$auth_token = getenv('AUTH_TOKEN');
echo "\xA", "+ ACCOUNT_SID   : ", $account_sid;
echo "\xA", "+ AUTH_TOKEN    : ", $auth_token;
echo "\xA+ Test the loading and using of the Twilio PHP helper library.";
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
use Twilio\Rest\Client;
$client = new Client($account_sid, $auth_token);

//------trying again ---------------------
$twilio = new Client($sid, $token);
//------trying again ---------------------


echo "\xA", "+ Twilio PHP Helper Library Client is working.";
//
echo "\xA---------------------------------------";
$workerSid = "WK7f7f36f4736bd726213081b876f6a1db";
echo "\xA", "+ Worker SID for testing the generation of tokens: ", $workerSid;
//
use Twilio\Jwt\ClientToken;
$client_capability = new ClientToken($account_sid, $auth_token);
$client_capability->allowClientIncoming($workerSid);
$client_token = $client_capability->generateToken();
// echo "\xA", "+ Worker Client token: ", $client_token;
echo "\xA", "+ Worker Client token created.";
//
$workspace_sid = getenv("WORKSPACE_SID");
echo "\xA", "+ WORKSPACE_SID : ", $workspace_sid;
use Twilio\Jwt\TaskRouter\WorkerCapability;
$capability = new WorkerCapability($account_sid, $auth_token, $workspace_sid, $workerSid);
$capability->allowFetchSubresources();
$capability->allowActivityUpdates();
$capability->allowReservationUpdates();
$workerToken = $capability->generateToken(28800);  // 60 * 60 * 8

//------trying again ---------------------
$recording = $twilio->recordings("RE557ce644e5ab84fa21cc21112e22c485")
                    ->fetch();
print($recording->callSid);
//------trying again ---------------------

// echo "\xA", "+ Worker token: ", $workerToken, "\xA";
echo "\xA", "+ Worker token created.";
//
echo "\xA--------------------------------------- \xA";
?>

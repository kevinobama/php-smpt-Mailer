<?php
/**
 * Created by PhpStorm.
 * User: kevingates
 * Date: 6/8/19
 * Time: 8:18 PM
 */
// The message
// $message = "I'm kevin developer  https://apple.stackexchange.com/questions/276322/where-is-the-postfix-log-on-sierra";


// // Send
// $success = mail('495702491@qq.com', 'kevin', $message);
$title = $message = "test";

// Send


$headers = 'Cc: 495702491@qq.com' . "\r\n";

$success = mail('495702491@qq.com', $title, $message, $headers);

if (!$success) {
    $errorMessage = error_get_last()['message'];
    print_r($errorMessage);
}

?>

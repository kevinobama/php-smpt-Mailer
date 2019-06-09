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

$message = "test";


// Send
//$success = mail('kzhou22@apple.com', 'test', $message);
//$success = mail('495702491@qq.com', 'kevin gates', $message);
 $success = mail('picture6542002@yahoo.com', 'kevin gates', $message);
//$success = mail('kzhou22@apple.com', 'kevin gates', $message);
// $success = mail('zhou224466@hotmail.com', 'kevin gates', $message);
// $success = mail('kevinobamatheus@gmail.com', 'kevin gates', $message);

if (!$success) {
    $errorMessage = error_get_last()['message'];
    print_r($errorMessage);
}

?>

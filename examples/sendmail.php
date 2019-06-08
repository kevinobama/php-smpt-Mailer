<?php
/**
 * Created by PhpStorm.
 * User: kevingates
 * Date: 6/8/19
 * Time: 8:18 PM
 */


// The message
$message = "I'm kevin developer";


// Send
$success = mail('zhou224466@hotmail.com', 'kevin', $message);
$success = mail('17717857782@163.com', 'kevin', $message);

if (!$success) {
    $errorMessage = error_get_last()['message'];
    print_r($errorMessage);
}

?>

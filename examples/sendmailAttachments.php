<?php
/**
 * Created by PhpStorm.
 * User: kevingates
 * Date: 6/8/19
 * Time: 8:18 PM
 */

////bool mail( $to, $subject, $message, $headers, $parameters );
//$message = "send-attachments-with-php-mail";
//
//// Send
//$success = mail('495702491@qq.com', 'send-attachments-with-php-mail', $message);
//
//if (!$success) {
//    $errorMessage = error_get_last()['message'];
//    print_r($errorMessage);
//}

$to = "495702491@qq.com";
$subject = "This is subject";
$message = "This is test message.";

# Open a file
$file = fopen( "/tmp/test.txt", "r" );

if( $file == false )
{

    echo "Error in opening file";

    exit();

}

# Read the file into a variable
$size = filesize("/tmp/test.txt");

$content = fread( $file, $size);
# encode the data for safe transit
# and insert \r\n after every 76 chars.
$encoded_content = chunk_split( base64_encode($content));

# Get a random 32 bit number using time() as seed.
$num = md5( time() );
# Define the main headers.
$header = "From:keingates@kevinmail.com\r\n";

$header .= "MIME-Version: 1.0\r\n";

$header .= "Content-Type: multipart/mixed; ";
$header .= "boundary=$num\r\n";

$header .= "--$num\r\n";
# Define the message section
$header .= "Content-Type: text/plain\r\n";

$header .= "Content-Transfer-Encoding:8bit\r\n\n";

$header .= "$message\r\n";

$header .= "--$num\r\n";
# Define the attachment section
$header .= "Content-Type:  multipart/mixed; ";

$header .= "name=\"test.txt\"\r\n";

$header .= "Content-Transfer-Encoding:base64\r\n";

$header .= "Content-Disposition:attachment; ";

$header .= "filename=\"test.txt\"\r\n\n";

$header .= "$encoded_content\r\n";

$header .= "--$num--";
# Send email now
$retval = mail ( $to, $subject, "", $header );
if( $retval == true )
{
    echo "Message sent successfully...";
}
else
{
    echo "Message could not be sent...";
}

?>
Sending email from the script is the very useful functionality in the web application. Most of the website used the email sending feature to send the notifications. If your web application uses PHP, it’s very easy to send email from the script using PHP.

PHP provides an easy way to send email from the website. Using mail() function in PHP, you can send text or HTML email. But sometimes email functionality needs to be extended for sending an attachment with the mail. In this tutorial, we will show you how to send email with attachment in PHP. Our example script makes it simple to send text or HTML email including any types of files as an attachment (like image, .doc, .docx, .pdf, .txt, etc.) using PHP.

Send HTML Email with Attachment
The PHP mail() function with some MIME type headers is used to send email with attachment in PHP. You need to specify the recipient email ($to), sender name ($fromName), sender email ($from), subject ($subject), file to attach ($file), and body content to send ($htmlContent). The following script lets you send the both type of message (text or HTML) with attachment file to the email.

<?php
//recipient
$to = 'recipient@example.com';

//sender
$from = 'sender@example.com';
$fromName = 'CodexWorld';

//email subject
$subject = 'PHP Email with Attachment by CodexWorld'; 

//attachment file path
$file = "codexworld.pdf";

//email body content
$htmlContent = '<h1>PHP Email with Attachment by CodexWorld</h1>
    <p>This email has sent from PHP script with attachment.</p>';

//header for sender info
$headers = "From: $fromName"." <".$from.">";

//boundary 
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//headers for attachment 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//multipart boundary 
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 

//preparing attachment
if(!empty($file) > 0){
    if(is_file($file)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
        "Content-Description: ".basename($file)."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//send email
$mail = @mail($to, $subject, $message, $headers, $returnpath); 

//email sending status
echo $mail?"<h1>Mail sent.</h1>":"<h1>Mail sending failed.</h1>";
The example script allows you to send single attachment to the email, to send email with multiple attachments see this tutorial – Send Email with Multiple Attachments in PHP

Sending Email to Multiple Recipients:
You can send email to the multiple recipients at once with Cc and Bcc. Use the Cc and Bcc headers for sending email with attachment to multiple recipients in PHP.

<?php
// Cc email
$headers .= "\nCc: mail@example.com";

// Bcc email
$headers .= "\nBcc: mail@example.com";
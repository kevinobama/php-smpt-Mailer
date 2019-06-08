
### Usage
1. Begin with running **setup_config.php**<br>
This will store your server connection settings.

2. After this you can try **example_minimal.php**<br>
It is a basic example like this:
```php
<?php

require 'class/SMTPMailer.php';
$mail = new SMTPMailer();

$mail->addTo('someaccount@hotmail.com');

$mail->Subject('Mail message for you');
$mail->Body(
    '<h3>Mail message</h3>
    This is a <b>html</b> message.<br>
    Greetings!'
);

if ($mail->Send()) echo 'Mail sent successfully';
else               echo 'Mail failure';

?>
```

$cfg_server   = 'smtp.qq.com';

$cfg_port     =  465;

$cfg_secure   = 'ssl';

$cfg_username = 'kevinobamatheus@gmail.com';

$cfg_password = '';


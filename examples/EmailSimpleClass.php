<?php

class Email {
    private $to = array();

    private $cc = array();

    private $bCc = array();

    private $from = null; 

    private $subject = null;

    private $body = null;
    
    private $contentType = 'plain';
    
    public $charSet = 'UTF-8'; 

    public function isPlain() 
    {
        $this->contentType= 'plain';
    }
    
    public function __construct() 
    {        
    }

    public function setFrom($email, $name = null) 
    {        
        if ($name !== null) {
            $stFrom = trim($email) . ' <' . trim($email) . '>';
        } else {
            $stFrom = $email;
        }
        $this->from = $stFrom;
    }
    
    public function setSubject($subject)
    {
        $this->subject = trim($subject);
    }

    public function setBody($body)
    {
        $this->body = $body;
    }
    
    private function addAddress($email, $destType, $name = null) 
    {
        if ($name !== null) {
            $stTo = trim($name) . ' <' . trim($email) . '>';
        } else {
            $stTo = $email;
        }        
        $this->{$destType}[] = $stTo;        
    }

    public function addTo($email, $name = null) 
    {                
        $this->addAddress($email, 'to', $name); 
    }
    
    public function addCC($email, $name = null) 
    {        
        $this->addAddress($email, 'cc', $name);
    }
    
    public function addBCC($email, $name = null) 
    {        
        $this->addAddress($email, 'bCc', $name);
    }

    public function send() 
    {        
        $stErros = '';        
        if ($this->from === null) {
            $stErros .= '<li>Informe o remetente da mensagem.</li>';
        }
        if (count($this->to) === 0) {
            $stErros .= '<li>Informe ao menos um destinatário.</li>';
        }
        if ($this->subject === null) {
            $stErros .= '<li>Informe o assunto da mensagem.</li>';
        }        
        if ($this->body === null) {
            $stErros .= '<li>Informe o texto da mensagem.</li>';
        }        
        if ($stErros !== '') {
            throw new Exception('Email erro(s): <ul>' . $stErros . '</ul>');
        }
        
        $headers = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/{$this->contentType}; charset={$this->charSet}";               
        $headers[] = "From: {$this->from}"; 
        
        if (count($this->cc) > 0) {
            foreach ($this->cc as $bCc) {
                $headers[] = 'Cc: ' . $bCc;
            }         
        }
        if (count($this->bCc) > 0) {
            foreach ($this->bCc as $bCc) {
                $headers[] = 'Bcc: ' . $bCc;
            }         
        }
        
        $stTo = implode(", ", $this->to);
        $stHeaders = implode("\r\n", $headers);
        

        $body = $this->body;

        echo($stTo);
        $boSend = mail($stTo, $this->subject, $body, $stHeaders);
        if (!$boSend) {
            throw new Exception('Email fail');
        }        
    }
  
    public function clearAllRecipients() 
    {
        $this->to = array();
        $this->cc = array();
        $this->bCc = array();
    }
}

$email = new Email();

//$email->addTo('picture6542002@yahoo.com');
//$email->addCC('495702491@qq.com');
//$email->setFrom('kevingates@gmail.com');
//$email->setSubject('test');
//$email->setBody('test');
//$email->send();



<?php
namespace Config;
use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig{
    public string $fromEmail = 'keisuk3.1114@gmail.com';
    public string $fromName = 'CrimsonSkillBoost';

    public string $recipients  = '';

    public string $userAgent = 'CodeIgniter';
    public string $protocol = 'smtp';
    
    public string  $SMTPHost = 'smtp.gmail.com';
    public string $SMTPUser = 'keisuk3.1114@gmail.com';
    public string $SMTPPass ='ythfgfvyrtychikf';
    public int $SMTPPort= 587;
    public string $SMTPCrypto = 'tls';

    public int $SMTPTimeout = 60;
    public bool $SMPTAuth = true;

    public bool $SMTPKeepAlive =false;

    public bool $wordWrap = true;
    public int $wrapChars = 76;

    public string $mailType = 'html';
    public string $charset = "UTF-8";

    public bool $validate = false;
    public int $priority = 3;

    public string $CRLF = "\n";
    public string  $newline = "\n";

    public bool $BCCBatchMode = false;
      public int $BCCBatchSize = 200;

    public bool $DSN = false;
      

}
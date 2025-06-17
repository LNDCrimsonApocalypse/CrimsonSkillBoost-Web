<?php
namespace Config;
use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig{
    public $default = [
    'protocol'  => 'smtp',
    'SMTPHost'  => 'smtp.gmail.com', // Your SMTP server
    'SMTPUser '  => 'keisuk3.1114@gmail.com', // Your email address
    'SMTPPass'  => 'tmrs wrrx vggz bnhy', // Your email password
    'SMTPPort'  => 587, // SMTP port
    'mailType'  => 'html', // or 'text'
    'charset'   => 'utf-8',
    'wordWrap'  => true,
];

}
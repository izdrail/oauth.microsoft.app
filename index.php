<?php


include 'vendor/autoload.php';

use LzoMedia\Heineken\Classes\EmailReader;


$email = new EmailReader();

dd($email->getEmails());

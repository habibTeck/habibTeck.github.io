<?php

/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'habibsaeed2023@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

print_r($contact);

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

// Gmail SMTP server address: smtp.gmail.com
// Gmail SMTP name: Your full name
// Gmail SMTP username: Your full Gmail address (e.g. you@gmail.com)
// Gmail SMTP password: The password that you use to log in to Gmail
// Gmail SMTP port (TLS): 587
// Gmail SMTP port (SSL): 465

// $contact->smtp = array(
//   'host' => 'smtp.gmail.com',
//   'username' => 'habibsaeed2023@gmail.com',
//   'password' => 'password',
//   'port' => '25'
// );


$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();

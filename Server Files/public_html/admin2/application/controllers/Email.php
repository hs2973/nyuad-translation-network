<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }

    }
    public function send()
    {
        $this->load->library('email');

        $subject = 'Thank you for your submission';
        $message = '<p>Dear Himal,</p>';
        $message .= '<p>Thank you for contributing to <a href="http://translationnetwork.org">Translation Network</a>. A member of the Network will receive your submission and post it at their earliest convenience.</p>';
        $message .= '<p>Check back to see if your submission has been carried over into other languages. We hope you will consider posting something again soon!</p>';
        $message .= '<p>Thank You,</p>';
        $message .= '<p>Translation Network </p>';

        $body ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset='.strtolower(config_item('charset')).'" />
<title>'.html_escape($subject).'</title>
<style type="text/css">
    body {
        font-family: Arial, Verdana, Helvetica, sans-serif;
        font-size: 16px;
    }
</style>
</head>
<body>
'.$message.'
</body>
</html>';

        //echo $body;
        // Also, for getting full html you may use the following internal method:
        //$body = $this->email->full_html($subject, $message);
        
        

        $result = $this->email
            ->from('submissions@translationnetwork.org', "Translation Network")
            ->reply_to('submissions@translationnetwork.org')    // Optional, an account where a human being reads.
            ->to('himal.shrestha@nyu.edu')
            ->subject($subject)
            ->message($body)
            ->send();

        var_dump($result);
        echo '<br />';
        echo $this->email->print_debugger();

        exit;
    }
}
<?php
class Controller{

    public function model($model)
    {
        require_once './app/models/'.$model.'.php';
        return new $model;
    }

    public function view($view, $data = [])
    {
        require_once './app/views/'.$view.'.php';
    }

    public function redirect($destination)  
    {
        header("location: " . URLROOT . "". $destination);
        exit();
    }

    public function sendMail ($destination, $subject, $content) 
    {
        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
        $headers .= "From: " . MAIL_FROM ."\r\n";
        $headers .= "Return-Path: " . MAIL_FROM ."\r\n"; 
        $send = mail($destination, $subject, $content, $headers);

        if($send) {
            return true;
        } else {
            return false;
        }        
    }
}

<?php
namespace App\Features\Pages;
class Page
{
    public static function init()
    {
        SendMail::init();
        SendNewsletter::init();
    }
}
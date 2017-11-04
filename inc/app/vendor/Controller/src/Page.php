<?php
namespace \Sober\Controller;

use Sober\Controller\Controller;

class Page extends Controller
{
    public function title()
    {
        return 'Test: ' . get_post()->post_title;
    }
}
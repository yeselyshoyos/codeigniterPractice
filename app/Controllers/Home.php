<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('estructura/header').view('estructura/body');
    }
}

<?php

namespace App\Controllers;

class HolaMundo extends BaseController
{
    public function index()
    {
        $valor['dato1'] = "dato 1";
        return view('holamundo/vista',$valor);
    }

    public function vista()
    {
        $valor['dato1'] = "segunda vista";
        return view('holamundo/vista',$valor);
    }
}

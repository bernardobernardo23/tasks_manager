<?php

namespace App\Controllers;

class Hello extends BaseController
{
    public function index(): string
    {
        return view('hello');
    }
}

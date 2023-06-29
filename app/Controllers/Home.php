<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
        // echo "Hello World";
    }
    function HelloWorld() //method
    {
        return view('hello_world');
    }
    function about($nama, $umur)
    {
        echo "Hallo, nama saya $nama, umur saya adalah $umur";
    }
}

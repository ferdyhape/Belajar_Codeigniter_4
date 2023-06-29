<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        return view('static_pages/v_home');
    }
    public function about()
    {
        return view('static_pages/v_about');
    }
    public function contact()
    {
        $data = [
            'alamat' => [
                [
                    'alamat' => 'Jl. ABC No. 123',
                    'telp' => '08123456789',
                    'email' => 'ferdy@gmail.com'
                ],
                [
                    'alamat' => 'Jl. BCD No. 234',
                    'telp' => '08123456722',
                    'email' => 'hape@gmail.com'
                ]
            ]
        ];
        return view('static_pages/v_contact', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function login()
    {
        $session = \Config\Services::session();
        $errors = $session->getFlashdata('errors');
        return view('auth/login', [
            'errors' => $errors,
        ]);
    }
    // authenticate
    public function authenticate()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'username' => 'required|min_length[3]|max_length[255]',
            'password' => 'required|min_length[3]|max_length[255]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password');
        }

        $session = session();
        $session->set('user_id', $user['id']);

        return redirect()->to('/')->with('success', 'Login successful');
    }

    // logout
    public function logout()
    {
        $session = session();
        $session->remove('user_id');
        return redirect()->to('/login')->with('success', 'Logout successful');
    }
}

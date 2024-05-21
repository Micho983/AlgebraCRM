<?php

namespace App\Controllers;  

class AuthController extends Controller
{
    public function showRegister()
    {
        return $this->render('register');
    }

    public function register()
    {
        $data = $this->getRequestData(['name', 'email', 'password']);
    }
}
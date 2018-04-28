<?php

namespace estoque\Http\Controllers;


use estoque\Http\Controllers\Controller;
use Request;
Use Auth;

class LoginController extends Controller
{
    public function logan()
    {
        $credenciais = Request::only('email', 'password');
        if(Auth::attempt($credenciais)) {
            return "Usuário ". Auth::user()->name." logado com sucesso";
        }
        return "As credencias não são válidas";

    }
}

<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller; // Importe a classe Controller corretamente


class DashController extends Controller
{
    // Exibe o formulário para criar um novo aplicativo
    public function dash()
    {
        return view('intranet.admin.dash.index');
    }
}

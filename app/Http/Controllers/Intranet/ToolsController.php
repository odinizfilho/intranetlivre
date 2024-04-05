<?php

namespace App\Http\Controllers\Intranet;

use App\Http\Controllers\Controller; // Importe a classe Controller corretamente


class ToolsController extends Controller
{
    // Exibe o formulário para criar um novo aplicativo
    public function signature()
    {
        return view('intranet.users.tools.signature');
    }
}

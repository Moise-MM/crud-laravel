<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * show all clienta
     *
     */
    public function index()
    {
        $clients = Client::orderBy('id','DESC')->paginate(7);

        return view('clients.index',[
            'clients' => $clients
        ]);
    }
}

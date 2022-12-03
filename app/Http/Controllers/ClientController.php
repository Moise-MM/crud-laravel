<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
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


    /**
     * Show create Form
     *
     * @return void
     */
    public function create()
    {
        //get all companies from database
        $companies = Company::all();

        return view('clients.create',[
            'companies' => $companies
        ]);
    }


    /**
     * Store client Data
     *
     * @return void
     */
    public function store(Request $request)
    {
        //validation 
        $formFileds = $request->validate([
            'name' => ['required','min:5'],
            'phone' => 'required',
            'gender' => 'required',
            'company_id' => 'required',
            'email' => ['required','email']
        ]);

        $formFields['image'] = "";

        //store data
        Client::create($formFileds);

        //
        return redirect(route('client.index'));
    }
}

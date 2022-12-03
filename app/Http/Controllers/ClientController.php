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
     * @param Request $request
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



    /**
     * Show edit form
     *
     * @param integer $id
     */
    public function edit(int $id)
    {
        $client = Client::find($id);
        $companies = Company::all();

        if($client)
        {
            return view('clients.edit',[
                'client' => $client,
                'companies' => $companies
            ]);
        }
        else
        {
            abort(404);
        }
    }


    /**
     * Update Client Data
     *
     * @param Request $request
     * @param Client $client
     */
    public function update(Request $request, Client $client)
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

        $client->update($formFileds);

        return redirect(route('client.index'));

    }


    /**
     * Delete client
     *
     * @param Client $client
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect(route("client.index"));
    }


}

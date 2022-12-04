<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    
    /**
     * show all companies
     *
     */
    public function index()
    {
        $companies = Company::orderBy('id','DESC')->get();

        return view('companies.index',[
            'companies' => $companies
        ]);
    }


    /**
     * Show create Form
     *
     */
    public function create()
    {
        return view('companies.create');
    }


    public function store(Request $request)
    {
        //validation
        $formFields = $request->validate([
            'name' => ['required','min:4'],
            'email' => ['required','email'],
            'website' => 'required',
            'address' => 'required'
        ]);

        $formFields['logo'] = "";

        //
        Company::create($formFields);


        return redirect(route('company.index'));
    }
}

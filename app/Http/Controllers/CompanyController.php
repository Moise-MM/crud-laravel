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
        $companies = Company::all();

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
}

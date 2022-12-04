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


    /**
     * Store company Data
     *
     * @param Request $request
     */
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


    /**
     * Show edit form
     *
     * @param integer $id
     * @return void
     */
    public function edit(int $id)
    {
        $company = Company::find($id);

        if($company)
        {
            return view('companies.edit',[
                'company' => $company
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
     * @param Company $company
     */
    public function update(Request  $request, Company $company)
    {
        //validation
        $formFields = $request->validate([
            'name' => ['required','min:4'],
            'email' => ['required','email'],
            'website' => 'required',
            'address' => 'required'
        ]);

        $company->update($formFields);

        return redirect(route('company.index'));
    }



    /**
     * Delete client
     *
     * @param Company $company
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect(route('company.index'));
    }
}

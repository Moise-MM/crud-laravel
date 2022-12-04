<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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
            'email' => ['required','email'],
            'image' => 'required|max:2048' 
        ]);


       if($request->file('image'))
       {

            //get the image
            $image = $request->file('image');

            //
            $newNameImage = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    
            $path_image = storage_path('app/public/uploads/clients/'.$newNameImage);

            if (!file_exists(storage_path('app/public/uploads/clients/'))) {
                mkdir((storage_path('app/public/uploads/clients/')), 666, true);
            }

            //resize image
            Image::make($image)->resize(500,600)->save($path_image);

            $formFileds['image'] = 'uploads/clients/'.$newNameImage;
       }

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
            'email' => ['required','email'],
            'image' => 'required|max:2048'
        ]);


        if($request->file('image'))
        {

             //delete old image
            if(File::exists(storage_path('app/public/'.$client->image))){
                File::delete(storage_path('app/public//'.$client->image));
            }
 
             //get the image
             $image = $request->file('image');
 
             //
             $newNameImage = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
     
             $path_image = storage_path('app/public/uploads/clients/'.$newNameImage);

             if (!file_exists(storage_path('app/public/uploads/clients/'))) {
                mkdir((storage_path('app/public/uploads/clients/')), 666, true);
            }
             
             //resize image
             Image::make($image)->resize(500,600)->save($path_image);
 
             $formFileds['image'] = 'uploads/clients/'.$newNameImage;
        }

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

        //delete image
        if(File::exists(storage_path('app/public/'.$client->image))){
            File::delete(storage_path('app/public//'.$client->image));
        }

        return redirect(route("client.index"));
    }


}

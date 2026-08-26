<?php

namespace App\Http\Controllers;

use App\Models\companysettings;
use Illuminate\Http\Request;

class companysettingController extends Controller
{
    public function index()
    {
        $company = companysettings::all();
        return view('companysettings', ['company' => $company]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'ntn' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'website' => 'required|url',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
            'address' => 'required',
            'logo' => 'required',
            
        ]);
        $name = $request->file('logo')->getClientOriginalName();
        $size = $request->file('logo')->getSize();
        $path = $request->file('logo')->move(public_path('storage/companylogo'), $name);
        $company = new companysettings();
        $company->Name = $request->input('name');
        $company->Phone = $request->input('phone');
        $company->NTN = $request->input('ntn');
        $company->Email = $request->input('email');
        $company->website = $request->input('website');
        $company->Whatsapp = $request->input('whatsapp');
        $company->Facebook = $request->input('facebook');
        $company->Insta = $request->input('instagram');
        $company->Address = $request->input('address');
        $company->logo = $name;
        $company->type = "official";
        $company->save();
        return redirect('companysettings')->with('success', 'companyinfo has been updated');

    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'ntn' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'website' => 'required|url',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
            'address' => 'required',
        ]);

        $company = companysettings::find($id);
        if (!$request->hasFile('logo')) {
            $company->Name = $request->input('name');
            $company->Phone = $request->input('phone');
            $company->NTN = $request->input('ntn');
            $company->Email = $request->input('email');
            $company->Website = $request->input('website');
            $company->Whatsapp = $request->input('whatsapp');
            $company->Facebook = $request->input('facebook');
            $company->Insta = $request->input('instagram');
            $company->Address = $request->input('address');
            $company->type= $request->input('companytype');
        } else {
            $name = $request->file('logo')->getClientOriginalName();
            $size = $request->file('logo')->getSize();
            $path = $request->file('logo')->move(public_path('storage/companylogo'), $name);
            $company = new companysettings();
            $company->Name = $request->input('name');
            $company->Phone = $request->input('phone');
            $company->NTN = $request->input('ntn');
            $company->Email = $request->input('email');
            $company->Website = $request->input('website');
            $company->Whatsapp = $request->input('whatsapp');
            $company->Facebook = $request->input('facebook');
            $company->Insta = $request->input('instagram');
            $company->Address = $request->input('address');
            $company->type= $request->input('companytype');
            $company->Logo = '$name';
        }
        $company->update();
        return redirect('companysettings')->with('success', 'Companyinfo has been updated');
    }

    public function store_unofficial(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'ntn' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'website' => 'required|url',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
            'address' => 'required',
            'logo' => 'required',
        ]);
        $name = $request->file('logo')->getClientOriginalName();
        $size = $request->file('logo')->getSize();
        $path = $request->file('logo')->storeAs('companylogo/', $name, 'public');
        
        $company = new companysettings();
        $company->Name = $request->input('name');
        $company->Phone = $request->input('phone');
        $company->NTN = $request->input('ntn');
        $company->Email = $request->input('email');
        $company->website = $request->input('website');
        $company->Whatsapp = $request->input('whatsapp');
        $company->Facebook = $request->input('facebook');
        $company->Insta = $request->input('instagram');
        $company->Address = $request->input('address');
        $company->company_type = "unofficial";
        $company->logo = $name;
        $company->save();
        return redirect('companysettings')->with('success', 'companyinfo has been updated');
        
    }
}

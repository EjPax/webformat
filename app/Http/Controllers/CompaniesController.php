<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Company;
use App\CompanyType;
use Illuminate\Validation\Rule;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index')->with('companies',$companies);
    }

    /**
     * Show the form for creating a new company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'company_types' => CompanyType::all()
        ];
        return view('companies.create',$data);
    }

    /**
     * Store a newly created company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate request
        $this->validation($request);

        // if validate process go on...
        
        $company = new Company();
        $company->name = $request->input('name');
        $company->type_id = $request->input('type');
        $company->address = $request->input('address');
        $company->city = $request->input('city');
        $company->zip = $request->input('zip');
        $company->country = $request->input('country');
        $company->phone = $request->input('phone');
        $company->email = $request->input('email');
        $company->website = $request->input('website');
        
        $company->save();
        
        return redirect(action('CompaniesController@index'))->with('success','New company added successfully!');
        
    }

    /**
     * Display the specified company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.show',$company);
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit',$company);
    }

    /**
     * Update the specified company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validation($request);

        // if validation success

        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->type_id = $request->input('type');
        $company->address = $request->input('address');
        $company->city = $request->input('city');
        $company->zip = $request->input('zip');
        $company->country = $request->input('country');
        $company->phone = $request->input('phone');
        $company->email = $request->input('email');
        $company->website = $request->input('website');

        $company->save();

        return redirect(action('CompaniesController@show',$id))->with('success','Company edited successfully!');;
    }

    /**
     * Remove the specified company from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        
        $company->agents()->delete();
        $company->delete();

        return redirect(action('CompaniesController@index'))->with('success','Company deleted successfully!');;
    }

    public function validation(Request $request) {
        
        // set validation rules foreach property
        $validationRules = [
            'name' => 'required|min:3|max:20',
            'type' => ['required',Rule::in(CompanyType::all()->keys())],
            'address' => 'nullable|max:30',
            'city' => 'nullable|max:20',
            'zip' => 'nullable|numeric',
            'country' => 'nullable|max:50',
            'phone' => 'nullable|numeric',
            'email' => 'nullable|e-mail|max:30',
            'website' => 'nullable|URL|max:100'
        ];

        // set custom error message
        $messages = [
            'e_mail' => 'e-mail field should be a valid e-mail address',
            'u_r_l' => 'website field should be a valid URL address'
        ];

        // validate using 'Validator' instance
        return Validator::make($request->all(),$validationRules,$messages)->validate();

    }

    public function suppliers() {

    return view('companies.suppliers')->with( 'companies',Company::all()->where('type.id','1') );
    }

    public function customers() {

    return view('companies.customers')->with('companies',Company::all()->where('type.id','2'));
    }
}

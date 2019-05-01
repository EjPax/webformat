<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\Company;
use Validator;

class AgentsController extends Controller
{
    /**
     * Display a listing of the agents for a specific company.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($companyId)
    {
        // not supported
        /*
        $agents = Agent::where('company_id',$companyId)->get();
        return $agents;
        */
    }

    /**
     * Show the form for creating a new agent for a specific company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($companyId)
    {
        return view('agents.create')->with('parentId',$companyId);
    }

    /**
     * Store a newly created agents in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $companyId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$companyId)
    {
        if ( Company::find($companyId) ) {
            
            $this->validation($request);
            
            $agent = new Agent();
            $agent->first_name = $request->input('first_name');
            $agent->last_name = $request->input('last_name');
            $agent->phone = $request->input('phone');
            $agent->email = $request->input('email');
            $agent->active = $request->input('active');
            $agent->company_id = $companyId;

            $agent->save();

            return redirect( action('CompaniesController@show',$companyId) );
        }

    }

    /**
     * Display the specified agents.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // not supported
    }

    /**
     * Show the form for editing the specified agents.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($companyId,$id)
    {
        $agent = Agent::find($id);
        return view('agents.edit',$agent);
    }

    /**
     * Update the specified agents in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $companyId, $id)
    {
        $agent = Agent::find($id);

        if ( $agent->company ) {

            $this->validation($request);
            
            // if validation success...

            $agent->first_name = $request->input('first_name');
            $agent->last_name = $request->input('last_name');
            $agent->phone = $request->input('phone');
            $agent->email = $request->input('email');
            $agent->active = $request->input('active');
            
            $agent->save();

            
            return redirect( action('CompaniesController@show',$agent->company_id) );
        }
    }

    /**
     * Remove the specified agents from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($companyId,$id)
    {
        Agent::find($id)->delete();
        
        return redirect( action('CompaniesController@show',$companyId) );
    }

    public function validation(Request $request) {
        
        // set validation ruleas foreach attribute
        $validationRules = [
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'phone' => 'nullable|numeric',
            'email' => 'nullable|email|max:20',
            'active' => 'boolean'
        ];

        // set custom error message
        $messages = [];

        // validate using 'Validator' instance
        return Validator::make($request->all(),$validationRules,$messages)->validate();

    }
}

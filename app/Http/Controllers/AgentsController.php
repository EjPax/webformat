<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\Company;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($companyId)
    {
        return Agent::where('company_id',$companyId)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($companyId)
    {
        return view('agents.create')->with('parentId',$companyId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$companyId)
    {
        if ( Company::find($companyId) ) {

            $this->validate($request,
                [
                    'agent_first_name' => 'required',
                    'agent_last_name' => 'required',
                    //'agent_phone' => 'numeric',
                    //'agent_mail' => 'email'
                ]);

            $agent = new Agent();

            $agent->first_name = $request->input('agent_first_name');
            $agent->last_name = $request->input('agent_last_name');
            $agent->phone = $request->input('agent_phone');
            $agent->email = $request->input('agent_mail');
            $agent->active = $request->input('agent_active');
            $agent->company_id = $companyId;

            $agent->save();

            
            return redirect( action('CompaniesController@show',$companyId) );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Agent::find($id);
    }

    /**
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $companyId, $id)
    {
        $agent = Agent::find($id);

        if ( $agent->company ) {

            $this->validate($request,
                [
                    'agent_first_name' => 'required|max:20',
                    'agent_last_name' => 'required|max:20',
                    //'agent_phone' => 'numeric',
                    'agent_mail' => 'sometimes|email|max:20'
                ]);

            $agent->first_name = $request->input('agent_first_name');
            $agent->last_name = $request->input('agent_last_name');
            $agent->phone = $request->input('agent_phone');
            $agent->email = $request->input('agent_mail');
            $agent->active = $request->input('agent_active');
            
            $agent->save();

            
            return redirect( action('CompaniesController@show',$agent->company_id) );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($companyId,$id)
    {
        Agent::find($id)->delete();
        return redirect( action('CompaniesController@show',$companyId) );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Job;
use Illuminate\Http\Request;
use Validator;


class ClientController extends Controller
{

    public function __construct(){
        $this->middleware('auth:api', ['all']);
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $client = Validator::make($request->all(),[
            'name' => 'required|string|max:20',
            'job_id' => 'max:10000',
        ]);

        if ($client->fails()){
            return response()->json(["error" => $client->errors()]);
        } else {
            $name = Client::create([
                'name' => request('name'),
                'job_id' => request('job_id'),
                'user_id' => $userId
            ]);
            return response()->json($name, 201);
        }
    }


    public function show(Client $client)
    {
        $userId = Auth::id();
        $allClients = Client::select('*')->where('user_id',$userId)->get();
        return response()->json($allClients, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client_id)
    {
        $client_id->delete();
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class JobController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['all']);
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $job = Validator::make($request->all(),[
            'address' => 'required|string|max:20',
            'description' => 'required|string|max:255',
            'start' => 'required|string|max:20',
            'finish' => 'required|string|max:20',
            'client_id' => 'required|string|max:20',
        ]);

        if($job->fails()){
            return response()->json(["error" => $job->errors()]);
        }else{
            // $brand = Client::find('job_id');
            // $products = $brand->job_id;
            // Client::where(1)->update($request->except(['_token', 'filePath']));
            $name = Job::create([
                'address' => request('address'),
                'description' => request('description'),
                'start' => request('start'),
                'finish' => request('finish'),
                'user_id' => $userId,
            ]);
            $client = $request->input('client_id');
            $createdJob = Job::latest()->first()->id;
            Client::where('id', $client)->update(array('job_id' => $createdJob));
            return response()->json($createdJob, 201);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
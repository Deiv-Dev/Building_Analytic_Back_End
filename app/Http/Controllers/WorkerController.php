<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Worker;
use Illuminate\Http\Request;
use Validator;

class WorkerController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['all']);
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $worker = Validator::make($request->all(),[
            'name' => 'required|string|max:20',
        ]);

        if($worker->fails()){
            return response()->json(["error" => $worker->errors()]);
        }else{
            $name = Worker::create([
                'name' => request('name'),
                'user_id' => $userId,
            ]);
            return response()->json($name, 201);
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
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        //
    }
}
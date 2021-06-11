<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\WorkerPay;
use Illuminate\Http\Request;
use Validator;

class WorkerPayController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['all']);
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $pay = Validator::make($request->all(),[
            'you_payd' => 'required|integer|max:1000000',
            'payd_from_date' => 'required|date',
            'payd_till_date' => 'required|date',
            'worker_id' => 'required|integer|max:1000000'
        ]);

        if($pay->fails()){
            return response()->json(["error" => $pay->errors()]);
        }else{
            $name = WorkerPay::create([
                'you_payd' => request('you_payd'),
                'payd_from_date' => request('payd_from_date'),
                'payd_till_date' => request('payd_till_date'),
                'worker_id' => 10,
                'user_id' => $userId,
            ]);
            return response()->json($name, 201);
        }
    }

    public function show(WorkerPay $WorkerPay)
    {
        
        $all = WorkerPay::select('*')->get();
        return response()->json($all, 201);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkerPay  $WorkerPay
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkerPay $WorkerPay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkerPay  $WorkerPay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkerPay $WorkerPay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkerPay  $WorkerPay
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkerPay $WorkerPay)
    {
        //
    }
}
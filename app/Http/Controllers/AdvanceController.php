<?php

namespace App\Http\Controllers;

use App\Advance;
use Illuminate\Http\Request;

class AdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request)
    {   
        return Advance::create([  
            'user_Id' => $request->user_Id,
            'control_Id' => $request->control_Id,
            'type' => $request->type,
            'nroOrder' => $request->nroOrder,
            'nroInvoice' => $request->nroInvoice,
            'description' => $request->description,
            'date' => $request->date,
            'status' => $request->status,
            'totalAmount' => $request->totalAmount,
            'DRSE' => $request->DRSE,
            'DEPS' => $request->DEPS
        ]);
    }

    // get advances without pagination
    public function getAll($id, $control_id = null){ 
        
        $advances = Advance::where('user_Id',$id)
                ->where('control_Id',$control_id)
                ->orderBy('date','desc')->get();
        
        return json_encode($advances);
    }
    
    // get budgets with pagination

    public function getPagination($id, $control_id=null){

        $advances = Advance::where('user_Id',$id)
                ->where('control_Id',$control_id)
                ->orderBy('date','desc')
                ->paginate(10);
        
        return json_encode($advances);
    }
    
    public function getById(Request $request){
        return Advance::find($request->id);
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
     * @param  \App\Advance  $advance
     * @return \Illuminate\Http\Response
     */
    public function show(Advance $advance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advance  $advance
     * @return \Illuminate\Http\Response
     */
    public function edit(Advance $advance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advance  $advance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advance $advance)
    {
        
        /*$request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);*/

        $advance = Advance::find($request->id);

        $advance->user_Id = $request->user_Id;

        $advance->nroOrder = $request->nroOrder;
        $advance->nroInvoice = $request->nroInvoice;
        $advance->description = $request->description;
        $advance->date = $request->date;
        $advance->status = $request->status;
        $advance->type = $request->type;
        $advance->totalAmount = $request->totalAmount;
        $advance->DRSE = $request->DRSE;
        $advance->DEPS = $request->DEPS;
        $advance->save();
        
        return 'OK';
    }

    public function remove(Request $request){
        $advance = Advance::find($request->id);
        $advance->delete();
        return 'ok';
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advance  $advance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advance $advance)
    {
        //
    }
}

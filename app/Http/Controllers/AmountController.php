<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use App\Models\Commision;
use App\Models\Reference;
use App\Models\User;
use Illuminate\Http\Request;

class AmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
        return view('amounts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Reference::all();
        
        return view('amounts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required',
            'amount' => 'required'
        ]);
        
        $ref = Reference::where('fullname', $validated['fullname'])->first();
        $id  = $ref->refId;
        $refId = $id;
        $user = User::where('name', $validated['fullname'])->first();
        $userId = $user->id;

        $totalAmount = $validated['amount'];

        function calculate_commision($refId, $totalAmount){
            $user = User::find($refId);
            

            
            $commision = (5/100)*$totalAmount;
            Commision::create([
                'name'=> $user->name,
                'commision' => $commision
            ]);
          
            $totalAmount = $totalAmount - $commision;
            $ref = Reference::where('fullname', $user->name)->first();
            $refId = $ref->refId;
            
            
            return [$refId, $totalAmount];
        }
        
        while($refId){
            
            [$refId, $totalAmount] = calculate_commision($refId, $totalAmount);
           
        }

        

        Amount::create([
            'userId' => $userId,
            'amount' => $totalAmount,
            'refId' => $id
        ]);
        

        if($refId == 0) return redirect()->route('amounts.index');
        


    }

    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amount  $amount
     * @return \Illuminate\Http\Response
     */
    public function show(Amount $amount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amount  $amount
     * @return \Illuminate\Http\Response
     */
    public function edit(Amount $amount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Amount  $amount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amount $amount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amount  $amount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amount $amount)
    {
        //
    }
}

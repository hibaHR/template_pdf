<?php

namespace App\Http\Controllers;

use App\Contract;
use PDF;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    //
    public function index()
    {
            $contracts = Contract::all();
    
            return \view('contracts.listcontract', ['contracts' => $contracts]);
    }
    
    
    public function create()
    {
        return view('contracts.create');
        
    }
    
    public function store (Request $request)
    {
        
        $contracts = new Contract();
            $contracts->reponse1 = $request->input('reponse1');
            $contracts->reponse2 = $request->input('reponse2');
            $contracts->reponse3 = $request->input('reponse3');
            $contracts->reponse4 = $request->input('reponse4');
            $contracts->reponse5 = $request->input('reponse5');
            $contracts->reponse6 = $request->input('reponse6');
            $contracts->reponse7 = $request->input('reponse7');
            $contracts->reponse8 = $request->input('reponse8');
            $contracts->reponse9 = $request->input('reponse9');
            
            $contracts->save();
        
        return view('contracts.listcontract')->with('success', 'Contract saved');
    }
    
    public function downloadPDF($id) {
        $contract = Contract::find($id);
        $pdf = PDF::loadView('contractpdf', compact('contract'));

        return $pdf->download('contract.pdf');
}
}

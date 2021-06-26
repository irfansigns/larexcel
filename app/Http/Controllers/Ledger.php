<?php

namespace App\Http\Controllers;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Ledger extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $parties = Party::distinct()->get(['des']);
        $parties = DB::table('parties')->select('des', DB::raw('round(sum(dr)) - round(sum(cr)) as balance'))
        ->groupBy('des')
        ->get();
        $fbalance = array();

        foreach($parties as $party){
            $balance = DB::table('parties')->select('doc_date')
            ->where('des',$party->des)
            ->orderBy('doc_date','desc')
            ->first();
            $newBal = [$party->des,$balance->doc_date,$party->balance];
            array_push($fbalance,$newBal);
        }

        //return $fbalance;
        return view('parties.index',['parties'=>$fbalance]);

        // $arr = json_encode($fbalance);
        // $arr1 = json_decode($arr,true);
        // foreach($arr1 as $key =>$value){
        //     echo $key."\n";
        //     foreach($value as $subkey => $subval){
        //         echo $subkey.$subval;
        //     }
        // }
        
        
        // Working
        // $parties = DB::table('parties')->select('des' , DB::raw('max(ddate) as ltran'))
        // ->groupBy('des')
        // ->get();
        // return view('parties.index',['parties'=>$parties]);

        // $parties = Party::distinct()->get(['des']);
        // return view('parties.index',['parties'=>$parties]);

        //  $parties = DB::table('parties')->select('des')
        // ->get();
        // return view('parties.index',['parties'=>$parties]);

        // $parties = Party::where('ddate' , Party::max('ddate'))->orderBy('ddate' , 'desc')->get();
        // return view('parties.index',['parties'=>$parties]);

        // $parties = DB::table('parties')->select('des', DB::raw(Party::max('ddate')))
        // ->groupBy('des')
        // ->get();
        // return view('parties.index',['parties'=>$parties]);

        // $parties = Party::select('des','ddate','balance')->where('ddate' , Party::max('ddate'))
        // ->orderBy('ddate','desc')
        // ->groupBy('des')
        // ->get();
        // return view('parties.index',['parties'=>$parties]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $party = Party::where('des' , $id)->get();
        $ftran = null;
        $ltran = null;
        $balance = null;
        
        $tDates = DB::table('parties')->select(DB::raw('max(doc_date) as ltran, min(doc_date) as ftran,
        round(sum(dr)) - round(sum(cr)) as balance'))
        ->where('des' , $id)
        ->get();

        foreach($tDates as $tDate){
            $ftran = $tDate->ftran;
            $ltran = $tDate->ltran;
            $balance = $tDate->balance;
        }

        return view('party.index',['parties'=>$party,'pname' => $id,
        'ltran'=>$ltran,'ftran'=>$ftran,'balance'=>$balance]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

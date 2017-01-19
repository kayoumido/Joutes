<?php

namespace App\Http\Controllers;
use App\Court; // This is the linked model
use App\Sport; // This is the linked model
use Illuminate\Http\Request;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courts = Court::all();
        return view('court.index')->with('courts',$courts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dropdownList = $this->getDropDownList();
        return view('court.create')->with('dropdownList', $dropdownList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $error = null;
        // Test: must be begin with 3caracter min. (all sports have minimum 3 caracters)
        $pattern = '/^[A-Za-z0-9]{1}/';

        if(Court::where('name', '=', $request->input('name'))->exists()){
            echo "true";
        }
        //$inputHasSportLinked

        // Check if name is empty OR has minimum 3caracter at the beginning
        if(empty($request->input('name')) || !preg_match($pattern, $request->input('name'))){
            $error = 'Nom invalide: 3 caractères minimum';
        }
        else if(empty($request->input('sport'))){
            $error = 'Veuillez sélectionner un sport';
        }


        if(empty($error)){
            //Sport::create($request->all());
            //return redirect()->route('sports.index');
            echo "OK";
        }else{
            $dropdownList = $this->getDropDownList();
            return view('court.create')->with('dropdownList', $dropdownList)->with('error', $error);
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
        //
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

    private function getDropDownList(){
        $sports = Sport::all();
        // Creation of the array will contain the datas of the dropdown list
        // This form: array("sport1" => "sport1", "sport2" => "sport2"), ...
        $dropdownList = array();
        for ($i=0; $i < sizeof($sports); $i++) { 
            $dropdownList[$sports[$i]->name] = $sports[$i]->name; 
        }
        return $dropdownList;
    }
}

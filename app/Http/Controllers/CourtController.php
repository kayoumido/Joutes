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
        // Test: must be begin with 1 caracter min.
        $pattern = '/^[A-Za-z0-9]{1}/';


        // Check if the name has min. 1 caracter at the beginning
        if(!preg_match($pattern, $request->input('name'))){
            $error = 'Nom invalide: 1 caractère minimum';
        }
        // Sport cannot be empty
        else if(empty($request->input('sport'))){
            $error = 'Veuillez sélectionner un sport';
        }
        // Check if there already is a court with the same name AND sport linked. A court can have many times same name but not for the same sport linked.
        else if(Court::whereRaw('name = ? and fk_sports = ?', [$request->input('name'), $request->input('sport')])->exists()){
            $error = 'Le terrain "'.$request->input('name').'" est déjà lier au sport "'.Sport::find($request->input('sport'))->name.'"';
        }


        if(empty($error)){
            $court = new Court;
            $court->name = $request->input('name');
            $court->fk_sports = $request->input('sport');
            $court->save();

            return redirect()->route('courts.index');
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
        // This form: array("sport_id 1" => "sport_name 1", "sport_id 2" => "sport_name 2"), ...
        $dropdownList = array();
        for ($i=0; $i < sizeof($sports); $i++) { 
            $dropdownList[$sports[$i]->id] = $sports[$i]->name; 
        }
        return $dropdownList;
    }
}

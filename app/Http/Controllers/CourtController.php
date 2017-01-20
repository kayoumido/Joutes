<?php

namespace App\Http\Controllers;
use App\Court; // This is the linked model
use App\Sport; // This is the linked model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        /* CUSTOM SPECIFIC VALIDATION */
        $customError = null;
        // Check if there already is a court with the same name AND sport linked. A court can have many times same name but not for the same sport linked.
        if(Court::whereRaw('name = ? and fk_sports = ?', [$request->input('name'), $request->input('sport')])->exists()){
            $customError = 'Le terrain "'.$request->input('name').'" est déjà lier au sport "'.Sport::find($request->input('sport'))->name.'".';
        }


        /* LARAVEL VALIDATION */
        // create the validation rules
        $rules = array(
            'name' => 'required|min:1|max:20',
            'sport' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails() || !empty($customError)) {
            $dropdownList = $this->getDropDownList();
            return view('court.create')->with('dropdownList', $dropdownList)->withErrors($validator->errors())->with('customError', $customError);
        } else {
            $court = new Court;
            $court->name = $request->input('name');
            $court->fk_sports = $request->input('sport');
            $court->save();

            return redirect()->route('courts.index');
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
        $court = Court::find($id);
        $dropdownList = $this->getDropDownList();
        return view('court.edit')->with('court', $court)->with('dropdownList', $dropdownList);
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
        $court = Court::find($id);

        /* CUSTOM SPECIFIC VALIDATION */
        $customError = null;
        // Check if there already is a court with the same name AND sport linked. A court can have many times same name but not for the same sport linked.
        if(Court::whereRaw('name = ? and fk_sports = ?', [$request->input('name'), $request->input('sport')])->exists()){
            $customError = 'Le terrain "'.$request->input('name').'" est déjà lier au sport "'.Sport::find($request->input('sport'))->name.'".';
        }


        /* LARAVEL VALIDATION */
        // create the validation rules
        $rules = array(
            'name' => 'required|min:1|max:20',
            'sport' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails() || !empty($customError)) {
            $dropdownList = $this->getDropDownList();
            return view('court.edit')->with('dropdownList', $dropdownList)->with('court', $court)->withErrors($validator->errors())->with('customError', $customError);
        } else {
            $court->name = $request->input('name');
            $court->fk_sports = $request->input('sport');
            $court->update();
            return redirect()->route('courts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $court = Court::findOrFail($id);
        $court->delete();
        return redirect()->route('courts.index');
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

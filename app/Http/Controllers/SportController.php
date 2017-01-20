<?php

namespace App\Http\Controllers;

use App\Sport; // This is the linked model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::all();


        return view('sport.index')->with('sports', $sports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        /* LARAVEL VALIDATION */
        // create the validation rules
        $rules = array(
            'name' => 'required|min:3|max:35|unique:sports,name',
            'description' => 'max:45' 
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return view('sport.create')->withErrors($validator->errors());
        } else {
            Sport::create($request->all());
            return redirect()->route('sports.index');
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
        $sport = Sport::find($id);
        return view('sport.edit')->with('sport', $sport);
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
        $sport = Sport::find($id);

        /* LARAVEL VALIDATION */
        // create the validation rules
        $rules = array(
            'name' => 'required|min:3|max:35',
            'description' => 'max:45' 
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return view('sport.edit')->withErrors($validator->errors())->with('sport', $sport);
        } else { 
            $sport->update($request->all());
            return redirect()->route('sports.index');
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
        $sport = Sport::findOrFail($id);
        $sport->delete();
        return redirect()->route('sports.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Sport; // This is the linked model
use Illuminate\Http\Request;

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
        // Check if the name already exists 
        if(Sport::where('name', '=', $request->input('name'))->exists()){
            $error = '"'.$request->input('name').'"'.' existe déjà';
            return view('sport.create')->with('error', $error);
        }else{
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
        // Check if the name already exists 
        if(Sport::where('name', '=', $request->input('name'))->exists()){
            $sport = Sport::find($id);
            $error = '"'.$request->input('name').'"'.' existe déjà';
            return view('sport.edit')->with('error', $error)->with('sport', $sport);
        }else{    
            $sport = Sport::find($id);
            $sport->update($request->all());
        }

        return redirect()->route('sports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sport = Sport::find($id);
        $sport->delete();

        return redirect()->route('sports.index');
    }
}

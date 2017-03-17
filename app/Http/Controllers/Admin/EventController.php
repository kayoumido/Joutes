<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Validator;
use File;

class EventController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @author Dessauges Antoine
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @author Dessauges Antoine
     */
    public function store(Request $request)
    {
        
        // create the validation rules
        $rules = array(
            'name' => 'required|min:3|max:35|unique:events,name',
            'img' => 'required|image|mimes:jpeg,png,jpg'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return view('event.create')->withErrors($validator->errors());
        } else {

            //move and rename img
            $imageName = date('Y_m_d-H_i_s').'.'.pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);  
            File::move($_FILES['img']['tmp_name'], storage_path().'/img/'.$imageName);
            
            //create and save event
            $event = new Event;
            $event->name = $request->name;
            $event->img = $imageName;
            $event->save();
            
            return redirect()->route('events.index');
        }

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
     * Remove the specified event from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @author Dessauges Antoine
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index');
    }
}

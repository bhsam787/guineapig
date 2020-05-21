<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;


class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){

       $this->middleware('auth');
     }
    public function index()
    {
        $units=Unit::all();
        return view('dashboard.unit.unit',[
          'units' =>$units
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('dashboard.unit.add_unit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data= request()->validate([
        'name'=>'required',
      ]);

      Unit::create($data);
      session()->flash('msg','Unit Created Successfully');
      return redirect(route('unit.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
      $unit->delete();
      session()->flash('msg','Unit Deleted Successfully');
      return redirect(route('unit.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
      return view('dashboard.unit.edit_unit')->with('unit', $unit);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
      $data= request()->validate([
        'name'=>'required'
      ]);
      $unit->update($data);
      session()->flash('msg','Updated Unit Successfully');
      return redirect(route('unit.index'));
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

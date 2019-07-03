<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destination;

class DestinationController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $destinations = Destination::all();
    return view('destination.index', compact('destinations'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  { }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $r)
  {
    // dd($r->all());
    if ($r->ajax()) {
      $destination = Destination::create($r->all());

      return Response()->json($destination);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  { }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Request $r)
  {
    $destination = Destination::find($r->id);
    return response()->json($destination);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  { }

  public function updatedestination(Request $r)
  {
    if ($r->ajax()) {
      $destination = Destination::find($r->id);
      $destination->destination_name  = $r->destination_name;

      $destination->save();
      return response()->json($destination);
    }
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $r)
  {
    $destination = destination::destroy($r->id);
  }
}
